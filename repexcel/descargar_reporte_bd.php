<?php

///// INCLUIR LA CONEXIÓN A LA BD /////////////////
include('conexion.php');
///// CONSULTA A LA BASE DE DATOS /////////////////
$documentos="SELECT * FROM documento order by documento_id";
$resDocumentos=$conexion->query($documentos);
$fcha = date("Y-m-d");?>

?>

<html lang="es">
	<head>
		<title>Descargar Reportes en Excel desde la BD</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
		<link href="css/estilos.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	</head>
	<body>
		<header>
			<div class="alert alert-info">
			<h2>Descargar Reportes en Excel/h2>
			</div>
		</header>
		<section>
			<table class="table">
				<tr class="bg-primary">
					<th>NRO SEGUIMIENTO</th>
					<th>DNI</th>
					<th>NOMBRE</th>
					<th>APELLIDO PATERNO</th>
					<th>APELLIDO MATERNO</th>
					<th>TUPA</th>
					<th>FECHA</th>
				</tr>
				<?php
				while ($registroAlumnos = $resDocumentos->fetch_array(MYSQLI_BOTH))
				{
					echo'<tr>
						 <td>'.$registroAlumnos['documento_id'].'</td>
						 <td>'.$registroAlumnos['doc_dniremitente'].'</td>
						 <td>'.$registroAlumnos['doc_nombreremitente'].'</td>
						 <td>'.$registroAlumnos['doc_apepatremitente'].'</td>
						 <td>'.$registroAlumnos['doc_apematremitente'].'</td>
						 <td>'.$registroAlumnos['tupa_descripcion'].'</td>
						 <td>'.$registroAlumnos['doc_fecharegistro'].'</td>
						 </tr>';
				}
				?>
			</table>
		</section>

		<form method="post" class="form" action="reporte.php">
		<input type="date" name="fecha1" value="<?php echo date("Y-m-d");?>">
		<input type="date" name="fecha2" required="">
		<input type="submit" name="generar_reporte">
		</form>
	</body>

</html>



