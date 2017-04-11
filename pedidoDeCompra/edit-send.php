<?php

require '../PHPMailer/PHPMailerAutoload.php';

$Mailer = new PHPMailer();

$mensagem = '<div>';
$mensagem .= '<img src="http://qualitex.com.br/images/logo.png">';
$mensagem .= '<h3>Seu pedido continua pendente de aprovação!</h3>';
$mensagem .= '</div>';
$mensagem .= '<h4>Email do responsável pela analise do pedido: '.$_POST['emailAprovador'].' </h4>';
$mensagem .= '<h4>Será necessario realizar as seguintes alterações: </h4>';
$mensagem .= '<p>'.$_POST['consideracoes'].'</p>';
$mensagem .= '<br><br>';
$mensagem .= '<h4>Mensagem automática, favor não responder!<h4>';

$Mailer->IsSMTP();
$Mailer->isHTML(true);
$Mailer->Charset = "UTF-8";
$Mailer->SMTPAuth = true;
$Mailer->SMTPSecure = 'ssl';
$Mailer->Host = 'smtp.gmail.com';
$Mailer->Port = 465;
$Mailer->Username = 'workflow@qualitex.com.br';
$Mailer->Password = 'Faraca@2015_QTX#';
$Mailer->From = $_POST['emailCriador']; 
$Mailer->FromName = 'workflow';
$assunto = "O pedido de compra nº " . $_POST['numPedido'] . ' precisa ser revisado!';
$Mailer->Subject = utf8_decode($assunto);
$Mailer->Body = utf8_decode($mensagem);
$Mailer->AltBody = 'ALT Conteudo';
$Mailer->AddAddress($_POST['emailCriador']); 
$Mailer->SMTPOptions  =  array ('ssl'=>array('verify_peer'=>false, 'verify_peer_name'=>false, 'allow_self_signed'=>true));  
	

if ($Mailer->Send()) {
	//echo("<script Language=JavaScript>alert('Mensagem enviada com sucesso. Em breve nossa equipe entrará em contato com você!')</script>");
	echo("<script>location.href='edit-resposta.php'</script>");
}else{
	echo 'Erro! ' . $Mailer->ErrorInfo;
}

?>
