<?php
	require '../../modelo/modelo_usuario.php';
	$MC = new Modelo_Usuario();
	$consulta = $MC->combo_area();
	echo json_encode($consulta);
?>
