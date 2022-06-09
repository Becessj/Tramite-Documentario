<?php
	include '../../modelo/modelo_usuario.php';
	$MC = new Modelo_usuario();
	$idusuario  = htmlspecialchars($_POST["idusuario"],ENT_QUOTES,'UTF-8');
    $contra2    = htmlspecialchars($_POST['clave'],ENT_QUOTES,'UTF-8');
	$clave      = password_hash($contra2, PASSWORD_DEFAULT , ['cost' => 10]);
	$consulta = $MC->editar_clave($idusuario,$clave);
	echo $consulta;
?>