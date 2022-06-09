<?php
    require '../../modelo/modelo_tipodocumento.php';
    $MT = new Modelo_Tipodocumento();//Instanciamos
    $nombre = htmlspecialchars(strtoupper($_POST['nombre']),ENT_QUOTES,'UTF-8');
    $consulta = $MT->Registrar_TipoDocumento($nombre);
    echo $consulta;

?>