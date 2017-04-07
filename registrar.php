<?php
require('database.php');
require('config.php');
$fecha = getdate();
$diaN = date('d');
$anio=date('Y');
$meses=["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
$diaS=["Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo"];
$dia2=$diaS[$fecha['wday']];
$mes=$meses[$fecha['mon']-1];
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Tarea 10</title>
	   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap Core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="container">

		<form enctype="multipart/form-data" method="post">
		<div class="row">
			<div class="col col-sm-6">
			<h1>Registro de Productos</h1>
			
				<div class="form-group input-group">
					<span class="input-group-addon">Marca</span>
					<input class="form-control" type="date" name="marca">
				</div>
				<div class="form-group input-group">
					<span class="input-group-addon">Fecha de compra</span>
					<input class="form-control" type="text" name="fecha">
				</div>
				<div class="form-group input-group">
					<span class="input-group-addon">tipo</span>
			         <select name="articulos" class="form-control">
						  <option value="tv">Tv</option>
						  <option value="microoondas">Microondas</option>
						  <option value="radio">Radio</option>
						  
						</select>
				</div>
				<div class="form-group input-group">
					<span class="input-group-addon">peso</span>
					<input class="form-control" type="text" name="peso">
				</div>
				<div class="form-group input-group">
					<span class="input-group-addon">Color</span>
				<input type="text" class="form-control" name="color">
				</div>
				<div class="form-group input-group">
					<span class="input-group-addon">Comentario</span>
					<input class="form-control" type="textarea" name="comentario">
				</div>
				<div class="form-group input-group">
					<span class="input-group-addon">Foto</span>
					<input class="form-control" type="file" name="foto">
				</div>
				<div class="text-center">
					 <button class="btn btn-success"> Guardar</button>
				     
				</div>
				
			</div>
		</div>
		<input type="hidden" name="log" id="log">
		<input type="hidden" name="lat" id="lat">
		</form>
		<?php
		
		if($_POST){
			extract($_POST,EXTR_OVERWRITE);
		
		}
		if(isset($marca) && isset($fecha) && isset($articulos) && isset($peso) && isset($color) && isset($comentario)){
 
		$nombre_imagen =$_FILES['foto']['name'];
		$nombre_carpeta = $_SERVER['DOCUMENT_ROOT'].'https://praticando.000webhostapp.com/registrar.php/tarea10/subir/';
		move_uploaded_file($_FILES['foto']['tmp_name'],$nombre_carpeta.$nombre_imagen);
	$db = new database(DB_HOST,DB_USER,DB_PASS,DB_NAME);

    $db->preparar("INSERT INTO tarea10	VALUES(null,'$marca',$fecha,'$articulos',$peso,'$color','$comentario','$nombre_imagen')");
		
    $db->ejecutar();
    $db->liberar();
			
			}
			
		
		
		
		?>
	</div>
	<hr>
	<table class="table">
	<thead>
		<tr>
			<td>#</td>
			<td>Marca</td>
			<td>Fecha</td>
			<td>Articulo</td>
			<td>Peso</td>
			<td>Color</td>
			<td>Comentario</td>
			<td>Imagen</td>
		</tr>
	</thead>
	<tbody>
		<?php
		$db = new database(DB_HOST,DB_USER,DB_PASS,DB_NAME);
		 $db->preparar("SELECT marca,fecha_compra,tipo,peso,color,foto,comentario
		                 FROM tarea10");
		 $db->ejecutar();
 		$db->prep()->bind_result($marca,$fecha,$tipo,$color,$peso,$comentario,$foto);
		$coneto=0;
		while($db->resultado()){
			$coneto++;
			echo"
			<tr>
			<td>$coneto</td>
			<td>$marca</td>
			<td>$fecha</td>
			<td>$tipo</td>
			<td>$peso</td>
			<td>$color</td>
			<td>$comentario</td>
			<td><img src='/tarea10/subir/$foto' width='100'/></td>
			</tr>
			";
		}
		$db->liberar();
		
		?>
	</tbody>
		
	</table>
</body>
</html>