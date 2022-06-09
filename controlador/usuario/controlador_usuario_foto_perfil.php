<?php
	require("postClass.php");
	include '../../modelo/modelo_usuario.php';
	$MC = new Modelo_usuario();
	$thisPost = new Post_Block;
if ($thisPost->postBlock($_POST['postID_principal'])) {
	$txt_idtrabajador_usuario = htmlspecialchars($_POST['txt_idtrabajador_usuario'],ENT_QUOTES,'UTF-8');
    $formato        	      = htmlspecialchars($_POST['txtformato_foto'],ENT_QUOTES,'UTF-8');
    

	if ($_FILES['txt_archivo_foto']['tmp_name']!="") {
		$total_imagenes = count(glob('../../Vista/empleado/Fotos/{*.jpg,*.png,*.jpeg,*.JPG,*.PNG,*.JPEG}',GLOB_BRACE));
		$archivo  = "Fotos/".($total_imagenes+1).".".$formato;
		$nombre   = "../../Vista/empleado/Fotos/".($total_imagenes+1).".".$formato;
		$ruta1    = $_FILES['txt_archivo_foto']['tmp_name'];
	}else{
		$archivo  = ""; 
	}
	
	$consulta = $MC->actualizar_foto($txt_idtrabajador_usuario,$archivo);
	if ($_FILES['txt_archivo_foto']['tmp_name']!="") {
		if ($consulta) {
			copy($ruta1, $nombre); 
		}
	}
} else {
    // Doble post, no procesamos el form.
    $consulta=10;
}
	echo $consulta;
?>

