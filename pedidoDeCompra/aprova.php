<?php


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Aprovar pedido de compra.</title>

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

					<form method="POST" action="aprova-send.php">
						<div align="center" class="form-group">
							 

							<br><br><br> 
							<label for="">
								<h2 align="center">Dados para conferência antes da aprovação: </h2>	
								<br><br><br>
								<p><b>Criado Por: </b> <?php echo  $_GET['emailCriador']; ?> </p>
								<p><b>Numero do pedido: </b> <?php echo $_GET['numPedido']; ?> </p>
								<p><b>Valor Total do pedido: </b> <?php echo  $_GET['valorTotal']; ?> </p>
							</label>
							
							<input  type="hidden" type="texte" name="emailCriador" id="emailCriador" value ="<?php echo $_GET['emailCriador']; ?>">
							<input  type="hidden" type="texte" name="emailAprovador" id="emailAprovador" value ="<?php echo $_GET['emailAprovador']; ?>">
							<input  type="hidden" type="texte" name="numPedido" id="numPedido" value ="<?php echo $_GET['numPedido']; ?>">

							<input  type="hidden" type="texte" name="statusPedido" id="statusPedido" value ="L">
							
						
						<button type="submit" class="btn btn-success">
							Aprovar pedido
						</button>

						</div>
						
						
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