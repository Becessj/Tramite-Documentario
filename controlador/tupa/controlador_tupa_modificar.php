<?php
    require '../../modelo/modelo_tupa.php';
    $MT = new Modelo_Tupa();//Instanciamos
    $tupa_id = htmlspecialchars(strtoupper($_POST['tupa_id']),ENT_QUOTES,'UTF-8');
    $nombre = htmlspecialchars(strtoupper($_POST['nombre']),ENT_QUOTES,'UTF-8');
    $estatus = htmlspecialchars(strtoupper($_POST['estatus']),ENT_QUOTES,'UTF-8');
    $consulta = $MT->Modificar_TUPA($tupa_id,$nombre,$estatus);
    echo $consulta;

?>