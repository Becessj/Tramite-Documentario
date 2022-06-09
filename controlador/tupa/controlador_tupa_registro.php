<?php
    require '../../modelo/modelo_tupa.php';
    $MT = new Modelo_TUPA();//Instanciamos
    $nombre = htmlspecialchars(strtoupper($_POST['nombre']),ENT_QUOTES,'UTF-8');
    $consulta = $MT->Registrar_TUPA($nombre);
    echo $consulta;

?>