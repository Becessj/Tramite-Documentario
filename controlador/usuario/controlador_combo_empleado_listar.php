<?php
	require '../../modelo/modelo_usuario.php';
	$MC = new Modelo_Usuario();
	$consulta = $MC->combo_empleado();
	echo json_encode($consulta);
?>
