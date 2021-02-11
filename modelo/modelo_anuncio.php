<?php

class Modelo_Anuncio
{
    private $conexion;

    function __construct()
    {
        require_once 'modelo_conexion.php';
        $this->conexion = new conexion();
        $this->conexion->conectar();
    }

    function listar_anuncio()
    {
        $sql = "call PA_LISTAR_ANUNCIO";

        $arreglo = array();
        if ($consulta = $this->conexion->conexion->query($sql)) {

            while ($consulta_VU = mysqli_fetch_assoc($consulta)) {
                $arreglo["data"][] = $consulta_VU;
            }
            return $arreglo;
            $this->conexion->cerrar();
        }
    }

    function Registrar_Anuncio($titulo, $descripcion, $archivo)
    {
        $sql = "call PA_REGISTRAR_ANUNCIO('$titulo','$descripcion','$archivo')";
        if ($consulta = $this->conexion->conexion->query($sql)) {
            if ($row = mysqli_fetch_array($consulta)) {
                return $id = trim($row[0]);//retorna valores
            }
            $this->conexion->cerrar();
        }
    }

    function Modificar_Anuncio($id_anuncio, $titulo, $descripcion, $archivo)
    {
        $sql = "call PA_MODIFICAR_ANUNCIO('$id_anuncio','$titulo','$descripcion','$archivo')";
        if ($consulta = $this->conexion->conexion->query($sql)) {
            if ($row = mysqli_fetch_array($consulta)) {
                return $id = trim($row[0]);//retorna valores
            }
            $this->conexion->cerrar();
        }
    }

}

?>