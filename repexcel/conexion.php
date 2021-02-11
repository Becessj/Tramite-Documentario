<?
$host="localhost";
$usuario="cuscmsqx_usuariotramite";
$contraseña="0*y7RkrhlEAp";
$base="cuscmsqx_tramitedocumentario";

$conexion= new mysqli($host, $usuario, $contraseña, $base);
if ($conexion -> connect_errno)
{
	die("Fallo la conexion:(".$conexion -> mysqli_connect_errno().")".$conexion-> mysqli_connect_error());
}

?>