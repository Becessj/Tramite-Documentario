<?php
	require '../../modelo/modelo_documento.php';
	$MC = new Modelo_documento();
	$txtnrodocumento = htmlspecialchars($_POST['txtnrodocumento'],ENT_QUOTES,'UTF-8');
	$cbm_anio        = htmlspecialchars($_POST['cbm_anio'],ENT_QUOTES,'UTF-8');
	$consulta = $MC->buscar_documento_externo($txtnrodocumento,$cbm_anio);
	echo json_encode($consulta);
?>