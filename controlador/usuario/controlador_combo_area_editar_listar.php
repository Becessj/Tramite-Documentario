<?php
	require '../../modelo/modelo_usuario.php';
	$MC = new Modelo_Usuario();
	$id = htmlspecialchars($_POST['idarea'],ENT_QUOTES,'UTF-8');  
	$consulta = $MC->listar_area_editar($id);
	echo json_encode($consulta);
?>
