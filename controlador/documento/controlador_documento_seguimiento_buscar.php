<?php
	require '../../modelo/modelo_documento.php';
	$MC = new Modelo_documento();
	$iddocumento = htmlspecialchars($_POST['iddocumento'],ENT_QUOTES,'UTF-8');
	$consulta    = $MC->buscar_documento_seguimiento($iddocumento);
	echo json_encode($consulta);
?>