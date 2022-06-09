<?php
	session_start();
	$usuario = htmlspecialchars($_POST['user'],ENT_QUOTES,'UTF-8');
	$pass    = htmlspecialchars($_POST['pass'],ENT_QUOTES,'UTF-8');
	require_once '../../modelo/modelo_usuario.php';
	$MU = new Modelo_usuario();
	$consulta = $MU->Verificar_usuario($usuario,$pass);
	$data = json_encode($consulta);
    if (count($consulta) > 0) {
	echo $data;
	}else{
		echo 0;
	}
?>
