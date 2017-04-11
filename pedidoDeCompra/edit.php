<?php

$linkInicial = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Editar pedido de compra.</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

  </head>
  <body>

    <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-4">
				</div>
				<div class="col-md-4">

					<form method="POST" action="edit-send.php">
						<div class="form-group">
							 
							<label for="">
								<h2>O que deve ser modificado no pedido de compra?</h2>	
							</label>
							
							<input  type="hidden" type="texte" name="emailCriador" id="emailCriador" value ="<?php echo $_GET['emailCriador']; ?>">
							<input  type="hidden" type="texte" name="emailAprovador" id="emailAprovador" value ="<?php echo $_GET['emailAprovador']; ?>">
							<input  type="hidden" type="texte" name="numPedido" id="numPedido" value ="<?php echo $_GET['numPedido']; ?>">
							
							<textarea name="consideracoes" id="consideracoes" class="form-control" rows="8"></textarea>
						
						</div>
						
						<button type="submit" class="btn btn-primary">
							Enviar necessidade
						</button>
					</form>
				</div>
				<div class="col-md-4">
				</div>
			</div>
		</div>
	</div>
</div>

    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/scripts.js"></script>
  </body>
</html>