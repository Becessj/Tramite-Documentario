<?php
     //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
	$mysqli = new mysqli("localhost","cuscmsqx_usuariotramite","0*y7RkrhlEAp","cuscmsqx_tramitedocumentario"); 
	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}
?>