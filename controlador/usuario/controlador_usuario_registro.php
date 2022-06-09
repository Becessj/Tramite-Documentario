<?php
    require_once '../../modelo/modelo_usuario.php';
    $usuario  = htmlspecialchars($_POST['usuario'],ENT_QUOTES,'UTF-8');
    $clave    = password_hash($_POST['clave'], PASSWORD_DEFAULT , ['cost' => 10]);
    $empleado = htmlspecialchars($_POST['empleado'],ENT_QUOTES,'UTF-8');
    $area     = htmlspecialchars($_POST['area'],ENT_QUOTES,'UTF-8');
    $rol  	  = htmlspecialchars($_POST['rol'],ENT_QUOTES,'UTF-8');
    $MC = new Modelo_usuario();
	$consulta = $MC->registrar_usuario($usuario,$clave,$empleado,$area,$rol);
	echo $consulta;
?>