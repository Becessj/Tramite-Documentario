<?php
require '../../modelo/modelo_anuncio.php';
$MA = new Modelo_Anuncio();//Instanciamos
$titulo = htmlspecialchars(strtoupper($_POST['titulo']), ENT_QUOTES, 'UTF-8');
$descripcion = htmlspecialchars(strtoupper($_POST['descripcion']), ENT_QUOTES, 'UTF-8');

$nuevo_nombre_archivo = null;
if (!empty($_FILES["txt_archivo"]["name"])) {
    $f_nombre = date_format(new DateTime('now'), "Ymd_His"); //nuevo nombre
    $archivo = explode('.', $_FILES["txt_archivo"]["name"]);
    $ext = end($archivo);
    $nombre_archivo = $f_nombre . '.' . $ext;
    $nuevo_nombre_archivo = 'archivo/' . $nombre_archivo;
    $nuevo_ruta_archivo = "../../Vista/anuncio/archivo/" . $nombre_archivo;
    // copy($_FILES["txt_archivo"]["tmp_name"], $nuevo_ruta_archivo);
    move_uploaded_file($_FILES["txt_archivo"]["tmp_name"], $nuevo_ruta_archivo);
}
$consulta = $MA->Registrar_Anuncio($titulo, $descripcion, $nuevo_nombre_archivo);
echo $consulta;
?>