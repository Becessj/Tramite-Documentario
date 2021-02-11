<?php
require '../../modelo/modelo_anuncio.php';
$MA = new Modelo_Anuncio();//Instanciamos
$id_anuncio = htmlspecialchars($_POST['id_anuncio'], ENT_QUOTES, 'UTF-8');
$titulo = htmlspecialchars(strtoupper($_POST['titulo']), ENT_QUOTES, 'UTF-8');
$descripcion = htmlspecialchars(strtoupper($_POST['descripcion']), ENT_QUOTES, 'UTF-8');
$id_archivo = $_POST['id_archivo'];

$nuevo_nombre_archivo = $id_archivo;
if (!empty($_FILES["archivo"]["name"])) {
    // Eliminamos el actual archivo  y procedemos a reemplazarlo
    unlink('../../Vista/anuncio/' . $id_archivo);
    // proc
    $f_nombre = date_format(new DateTime('now'), "Ymd_His"); //nuevo nombre
    $archivo = explode('.', $_FILES["archivo"]["name"]);
    $ext = end($archivo);
    $nombre_archivo = $f_nombre . '.' . $ext;
    $nuevo_nombre_archivo = 'archivo/' . $nombre_archivo;
    $nuevo_ruta_archivo = "../../Vista/anuncio/archivo/" . $nombre_archivo;
    move_uploaded_file($_FILES["archivo"]["tmp_name"], $nuevo_ruta_archivo);
}

$consulta = $MA->Modificar_Anuncio($id_anuncio, $titulo, $descripcion, $nuevo_nombre_archivo);
echo $consulta;

?>