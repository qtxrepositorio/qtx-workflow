<?php

require '../../../plugins/PHPMailer/PHPMailerAutoload.php';
require_once('../../../plugins/nusoap/lib/nusoap.php');

/*

<ns:CDOC>?</ns:CDOC>
<ns:CEMAILAPROV>?</ns:CEMAILAPROV>
<ns:CEMAILCRIADOR>?</ns:CEMAILCRIADOR>
<ns:STATUSPEDIDO>?</ns:STATUSPEDIDO>

*/

$params = array('PUTDADOSPC' => array("CDOC" => $_POST['numPedido'], 
						"CEMAILAPROV" => $_POST['emailAprovador'], 
						"CEMAILCRIADOR" => $_POST['emailCriador'],
						"STATUSPEDIDO" => "L"));

ini_set("soap.wsdl_cache_enabled", 0);
$wsdl = "http://192.168.0.6:81/WS_INTEGRACAO.apw?WSDL";
$client = new nusoap_client($wsdl, 'wsdl');
$result=$client->call('PUTPC', $params);

if($result["PUTPCRESULT"]["LLOGICO"] == "true"){
	
	$Mailer = new PHPMailer();

	$mensagem = '<div>';
	$mensagem .= '<img src="http://qualitex.com.br/images/logo.png">';
	$mensagem .= '<h3>Seu pedido nº ' . $_POST['numPedido'] . ' foi aprovado!</h3>';
	$mensagem .= '</div>';
	$mensagem .= '<h4>Email do responsável pela aprovação: '.$_POST['emailAprovador'].' </h4>';
	$mensagem .= '<br><br>';
	$mensagem .= '<h4>Mensagem automática, favor não responder!<h4>';

	$Mailer->IsSMTP();
	$Mailer->isHTML(true);
	$Mailer->Charset = "UTF-8";
	$Mailer->SMTPAuth = true;
	$Mailer->SMTPSecure = 'tls';
	$Mailer->Host = 'smtp.gmail.com';
	$Mailer->Port = 587;
	$Mailer->Username = 'workflow@qualitex.com.br';
	$Mailer->Password = 'Faraca@2015_QTX#';
	$Mailer->From = $_POST['emailCriador']; 
	$Mailer->FromName = 'workflow';
	$assunto = "O pedido de compra nº " . $_POST['numPedido'] . ' foi aprovado!';
	$Mailer->Subject = utf8_decode($assunto);
	$Mailer->Body = utf8_decode($mensagem);
	$Mailer->AltBody = 'ALT Conteudo';
	$Mailer->AddAddress($_POST['emailCriador']); 
	$Mailer->SMTPOptions  =  array ('ssl'=>array('verify_peer'=>false, 'verify_peer_name'=>false, 'allow_self_signed'=>true));  

	//$Mailer->SMTPDebug = 3;

	if ($Mailer->Send()) {
		echo("<script>location.href='../../View/PedidoDeCompra/aprova-resposta.php'</script>");
	}

}

?>
