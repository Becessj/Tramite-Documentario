<?php
    require_once '../../modelo/modelo_usuario.php';
    $id_usuario  = htmlspecialchars($_POST['id_usuario'],ENT_QUOTES,'UTF-8');
    $cmb_area    = htmlspecialchars($_POST['cmb_area'],ENT_QUOTES,'UTF-8');
    $MC = new Modelo_usuario();
	$consulta = $MC->editar_usuario($id_usuario,$cmb_area);
	echo $consulta;
?>
