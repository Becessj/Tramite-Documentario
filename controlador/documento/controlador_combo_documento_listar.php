<?php
	require '../../modelo/modelo_documento.php';
	$MC = new Modelo_documento();
	$consulta = $MC->combo_tipodocumento();
	echo json_encode($consulta);
?>
