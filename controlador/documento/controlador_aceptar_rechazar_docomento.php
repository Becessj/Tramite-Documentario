<?php
    require("postClass.php");
    require '../../modelo/modelo_documento.php';
    $MC = new Modelo_documento();
    $thisPost = new Post_Block;
if ($thisPost->postBlock($_POST['postID'])) {
	$txt_idmovimiento = htmlspecialchars($_POST['txt_idmovimiento'],ENT_QUOTES,'UTF-8');
    $txt_iddocumento  = htmlspecialchars($_POST['txt_iddocumento'],ENT_QUOTES,'UTF-8');
    $txt_asunto       = htmlspecialchars($_POST['txt_asunto'],ENT_QUOTES,'UTF-8');
    $txt_tipo         = htmlspecialchars($_POST['txt_tipo'],ENT_QUOTES,'UTF-8');
	$consulta = $MC->registrar_aceptar_finalizar($txt_idmovimiento,$txt_iddocumento,$txt_asunto,$txt_tipo);
} else {
    $consulta=10;
}
	echo $consulta;
?>
