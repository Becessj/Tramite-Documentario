<?php
	require '../../modelo/modelo_documento.php';
	$MC = new Modelo_documento();
	$idmovimiento = htmlspecialchars($_POST['idmovimiento'],ENT_QUOTES,'UTF-8');
	$consulta    = $MC->buscar_documento_seguimiento_accion($idmovimiento);
	echo json_encode($consulta);
?>