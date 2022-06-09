<?php
    include '../../modelo/modelo_usuario.php';
    $idarea = htmlspecialchars($_POST['idarea'],ENT_QUOTES,'UTF-8');
	$MC = new Modelo_usuario();
	$consulta = $MC->trear_area_widget($idarea);
	echo json_encode($consulta);
?>