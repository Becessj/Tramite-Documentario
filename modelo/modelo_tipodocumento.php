<?php
	class Modelo_Tipodocumento
	{
		private $conexion;
		function __construct()
		{
		    require_once 'modelo_conexion.php';
		    $this->conexion = new conexion();
			$this->conexion->conectar();
		}
		function listar_tipodocumento(){
			$sql = "call PA_LISTAR_TIPODOCUMENTO";

			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {

				while ($consulta_VU = mysqli_fetch_assoc($consulta)) {
					$arreglo["data"][] = $consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
		}

		function Registrar_TipoDocumento($nombre){
            $sql = "call PA_REGISTRAR_TIPODOCUMENTO('$nombre')";
			if ($consulta = $this->conexion->conexion->query($sql)) {
				if ($row = mysqli_fetch_array($consulta)) {
                        return $id= trim($row[0]);//retorna valores
				}
				$this->conexion->cerrar();
			}
		}
		
		function Modificar_TipoDocumento($idtipodocumento,$nombre,$estatus){
            $sql = "call PA_MODIFICAR_TIPODOCUMENTO('$idtipodocumento','$nombre','$estatus')";
			if ($consulta = $this->conexion->conexion->query($sql)) {
				if ($row = mysqli_fetch_array($consulta)) {
                        return $id= trim($row[0]);//retorna valores
				}
				$this->conexion->cerrar();
			}
        }
		
	}
?>