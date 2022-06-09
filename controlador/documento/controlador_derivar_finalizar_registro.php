<?php
    require("postClass.php");
    require '../../modelo/modelo_documento.php';
    $MC = new Modelo_documento();
    $thisPost = new Post_Block;
if ($thisPost->postBlock($_POST['postID'])) {
	$txt_iddocumento   = htmlspecialchars($_POST['txt_iddocumento'],ENT_QUOTES,'UTF-8');
    $txt_idareaactual  = htmlspecialchars($_POST['txt_idareaactual'],ENT_QUOTES,'UTF-8');
    $txt_idareadestino = htmlspecialchars($_POST['txt_idareadestino'],ENT_QUOTES,'UTF-8');
    $txt_descripcion   = htmlspecialchars($_POST['txt_descripcion'],ENT_QUOTES,'UTF-8');
    $txt_estado        = htmlspecialchars($_POST['txt_estado'],ENT_QUOTES,'UTF-8');
    $txt_idusuario     = htmlspecialchars($_POST['txt_idusuario'],ENT_QUOTES,'UTF-8');
    $txt_idmovimiento  = htmlspecialchars($_POST['txt_idmovimiento'],ENT_QUOTES,'UTF-8');
	$consulta = $MC->registrar_derivacion_finalizacion($txt_iddocumento,$txt_idareaactual,$txt_idareadestino,$txt_descripcion,$txt_estado,$txt_idusuario,$txt_idmovimiento);
} else {
    $consulta=10;
}
	echo $consulta;
?>
