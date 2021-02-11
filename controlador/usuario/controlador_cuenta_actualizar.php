<?php
	include '../../modelo/modelo_usuario.php';
	$MC = new Modelo_usuario();;
	$usuario     =  $_POST["_usuario"];
	$actual      =  $_POST["_actual"];
	$original    =  $_POST["_original"];
	if(password_verify($actual, $original)){
        $contra2     = htmlspecialchars($_POST['_nueva'],ENT_QUOTES,'UTF-8');
		$nueva       = password_hash($contra2, PASSWORD_DEFAULT , ['cost' => 10]);
		$consulta = $MC->editar_cuenta($usuario,$original,$nueva);
		echo $consulta;
    }else{
    	echo 2;
    }
?>