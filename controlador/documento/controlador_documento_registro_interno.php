<?php
	require("postClass.php");
	require '../../modelo/modelo_documento.php';
	$MC = new Modelo_documento();
	$thisPost = new Post_Block;
if ($thisPost->postBlock($_POST['postID'])) {
	$txtdni  		= htmlspecialchars($_POST['txtdni'],ENT_QUOTES,'UTF-8');
    $txtnombre 		= htmlspecialchars($_POST['txtnombre'],ENT_QUOTES,'UTF-8');
    $txtapepat      = htmlspecialchars($_POST['txtapepat'],ENT_QUOTES,'UTF-8');
    $txtapemat  	= htmlspecialchars($_POST['txtapemat'],ENT_QUOTES,'UTF-8');

    $txtcelular  	= htmlspecialchars($_POST['txtcelular'],ENT_QUOTES,'UTF-8');
    $txtemail 		= htmlspecialchars($_POST['txtemail'],ENT_QUOTES,'UTF-8');
    $txt_direccion  = htmlspecialchars($_POST['txt_direccion'],ENT_QUOTES,'UTF-8');
    $txt_representacion= htmlspecialchars($_POST['txt_representacion'],ENT_QUOTES,'UTF-8');

    $txt_ruc  	  	= htmlspecialchars($_POST['txt_ruc'],ENT_QUOTES,'UTF-8');
    $txt_empresa  	= htmlspecialchars($_POST['txt_empresa'],ENT_QUOTES,'UTF-8');

    $cmb_procedenciadocumento = htmlspecialchars($_POST['cmb_procedenciadocumento'],ENT_QUOTES,'UTF-8');
    $cmb_tipodocumento = htmlspecialchars($_POST['cmb_tipodocumento'],ENT_QUOTES,'UTF-8');
    $txt_nrodocumentos = htmlspecialchars($_POST['txt_nrodocumentos'],ENT_QUOTES,'UTF-8');
    $txt_folios  	   = htmlspecialchars($_POST['txt_folios'],ENT_QUOTES,'UTF-8');
    $txt_asunto        = htmlspecialchars($_POST['txt_asunto'],ENT_QUOTES,'UTF-8');
    $formato  	       = htmlspecialchars($_POST['txtformato'],ENT_QUOTES,'UTF-8');

	$cmb_area_destino  = htmlspecialchars($_POST['cmb_area_destino'],ENT_QUOTES,'UTF-8');	

	if ($_FILES['txt_archivo']['tmp_name']!="") {
		$total_imagenes = count(glob('../../Vista/documento/archivo/{*.pdf,*.PDF,*.docx}',GLOB_BRACE));
		$archivo  = "archivo/".($cmb_tipodocumento."-".$txt_nrodocumentos."-".$txtdni).".".$formato;
		$nombre   = "../../Vista/documento/archivo/".($cmb_tipodocumento."-".$txt_nrodocumentos."-".$txtdni).".".$formato;
		$ruta1    = $_FILES['txt_archivo']['tmp_name'];
	}else{
		$archivo  = ""; 
	}
	$consulta = $MC->registrar_documento_interno($txtdni,$txtnombre,$txtapepat,$txtapemat,$txtcelular,$txtemail,$txt_direccion,$txt_ruc,$txt_empresa,$cmb_tipodocumento,$txt_nrodocumentos,$txt_folios,$txt_asunto,$archivo,$txt_representacion,$cmb_procedenciadocumento,$cmb_area_destino);
	if ($_FILES['txt_archivo']['tmp_name']!="") {
		if ($consulta!=2  || $consulta!=0 ) {
			copy($ruta1, $nombre); 
		}
	}
} else {
    // Doble post, no procesamos el form.
    $consulta=10;
}
	echo $consulta;
?>

