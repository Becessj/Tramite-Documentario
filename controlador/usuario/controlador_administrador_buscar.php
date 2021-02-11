<?php
	$buscar = htmlspecialchars($_POST['buscar'],ENT_QUOTES,'UTF-8');
	include '../../modelo/modelo_usuario.php';
	$MC = new Modelo_usuario();
	$consulta = $MC->buscar_administrador($buscar);
	echo json_encode($consulta);
?>