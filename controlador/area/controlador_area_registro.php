<?php
    require '../../modelo/modelo_area.php';
    $MA = new Modelo_Area();//Instanciamos
    $nombre = htmlspecialchars(strtoupper($_POST['nombre']),ENT_QUOTES,'UTF-8');
    $consulta = $MA->Registrar_Area($nombre);
    echo $consulta;

?>