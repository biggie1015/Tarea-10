<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	 <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap Core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">
	
</head>
<body>
	<div class="container">

		<form method="post">
		<div class="row">
			<div class="col col-sm-6">
			<h1>Registro de Productos</h1>
			
				<div class="form-group input-group">
					<span class="input-group-addon">Usuario</span>
					<input class="form-control" type="text" name="nombre">
				</div>
				<div class="form-group input-group">
					<span class="input-group-addon">Contrasena</span>
					<input class="form-control" type="password" name="pass">
				</div>
				
					 <button class="btn btn-success"> Guardar</button>
				     
				</div>
				
			</div>
		
		
		</form>
		
	
		
	</div>
</body>
</body>
</html>
	<?php
		if($_POST){
		$nombre = $_POST['nombre'];
		$pass = $_POST['pass'];
		
		if($nombre=='admin' && $pass=='1tl4w3b'){
			header("Location:registrar.php");
		}
		else{
			echo"Contrasena o/y iusuario invalido";
		}
			}
		?>