<?php
    require '../../modelo/modelo_area.php';
    $MA = new Modelo_Area();//Instanciamos
    $idarea = htmlspecialchars($_POST['idarea'],ENT_QUOTES,'UTF-8');
    $nombre = htmlspecialchars(strtoupper($_POST['nombre']),ENT_QUOTES,'UTF-8');
    $estatus = htmlspecialchars(strtoupper($_POST['estatus']),ENT_QUOTES,'UTF-8');
    $consulta = $MA->Modificar_Area($idarea,$nombre,$estatus);
    echo $consulta;

?>