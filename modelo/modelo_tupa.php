<?php
	class Modelo_TUPA
	{
		private $conexion;
		function __construct()
		{
		    require_once 'modelo_conexion.php';
		    $this->conexion = new conexion();
			$this->conexion->conectar();
		}
		function listar_tupa(){
			$sql = "call PA_LISTAR_TUPA";

			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {

				while ($consulta_VU = mysqli_fetch_assoc($consulta)) {
					$arreglo["data"][] = $consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
		}

		function Registrar_TUPA($nombre){
            $sql = "call PA_REGISTRAR_TUPA('$nombre')";
			if ($consulta = $this->conexion->conexion->query($sql)) {
				if ($row = mysqli_fetch_array($consulta)) {
                        return $id= trim($row[0]);//retorna valores
				}
				$this->conexion->cerrar();
			}
		}
		
		function Modificar_TUPA($tupa_id,$nombre,$estatus){
            $sql = "call PA_MODIFICAR_TUPA('$tupa_id','$nombre','$estatus')";
			if ($consulta = $this->conexion->conexion->query($sql)) {
				if ($row = mysqli_fetch_array($consulta)) {
                        return $id= trim($row[0]);//retorna valores
				}
				$this->conexion->cerrar();
			}
        }
		
	}
?>