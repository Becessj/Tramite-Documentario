<?php
    require_once '../../modelo/modelo_usuario.php';
    $idusuario  = htmlspecialchars($_POST['idusuario'],ENT_QUOTES,'UTF-8');
    $estatus    = htmlspecialchars($_POST['estatus'],ENT_QUOTES,'UTF-8');
    $MC 		= new Modelo_usuario();
	$consulta	= $MC->Modificar_Estatus_Usuario($idusuario,$estatus);
	echo $consulta;
?>
