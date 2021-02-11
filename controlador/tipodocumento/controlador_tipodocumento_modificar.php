<?php
    require '../../modelo/modelo_tipodocumento.php';
    $MT = new Modelo_Tipodocumento();//Instanciamos
    $idtipodocumento = htmlspecialchars(strtoupper($_POST['idtipodocumento']),ENT_QUOTES,'UTF-8');
    $nombre = htmlspecialchars(strtoupper($_POST['nombre']),ENT_QUOTES,'UTF-8');
    $estatus = htmlspecialchars(strtoupper($_POST['estatus']),ENT_QUOTES,'UTF-8');
    $consulta = $MT->Modificar_TipoDocumento($idtipodocumento,$nombre,$estatus);
    echo $consulta;

?>