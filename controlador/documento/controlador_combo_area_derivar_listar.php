<?php
	require '../../modelo/modelo_documento.php';
	$MC = new Modelo_documento();
	$area_id = htmlspecialchars($_POST['area_id'],ENT_QUOTES,'UTF-8');
	$consulta = $MC->combo_area_derivar($area_id);
	echo json_encode($consulta);
?>
