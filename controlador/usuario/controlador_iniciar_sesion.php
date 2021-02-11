<?php
	$iduser = $_POST['iduser'];
	$user   = $_POST['user'];
	$tipo   = $_POST['tipousuario'];
	$idtrab = $_POST['idtrabajador'];
	session_start();
	$_SESSION['id_usuario_sistematramite'] = $iduser;
	$_SESSION['id_trabajador_sistematramite'] = $idtrab;
	$_SESSION['usuario_sistematramite'] = $user;
	$_SESSION['tipo_usuario_sistematramite']=$tipo;
	$_SESSION['tiempo_sistema'] = time()+1800;
?>