<?php
	include '../../modelo/modelo_usuario.php';
	$MC = new Modelo_usuario();
	$consulta = $MC->trear_administrador_widget();
	echo json_encode($consulta);
?>