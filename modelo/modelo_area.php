<?php
	class Modelo_Area
	{
		private $conexion;
		function __construct()
		{
		    require_once 'modelo_conexion.php';
		    $this->conexion = new conexion();
			$this->conexion->conectar();
		}
		function listar_area(){
			$sql = "call PA_LISTAR_AREA";

			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {

				while ($consulta_VU = mysqli_fetch_assoc($consulta)) {
					$arreglo["data"][] = $consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
		}

		function Registrar_Area($nombre){
            $sql = "call PA_REGISTRAR_AREA('$nombre')";
			if ($consulta = $this->conexion->conexion->query($sql)) {
				if ($row = mysqli_fetch_array($consulta)) {
                        return $id= trim($row[0]);//retorna valores
				}
				$this->conexion->cerrar();
			}
		}
		
		function Modificar_Area($idarea,$nombre,$estatus){
            $sql = "call PA_MODIFICAR_AREA('$idarea','$nombre','$estatus')";
			if ($consulta = $this->conexion->conexion->query($sql)) {
				if ($row = mysqli_fetch_array($consulta)) {
                        return $id= trim($row[0]);//retorna valores
				}
				$this->conexion->cerrar();
			}
        }
		
	}
?>