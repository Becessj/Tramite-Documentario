<?php
	class Modelo_Empleado{
		private $conexion;
		function __construct()
		{
			require_once('modelo_conexion.php');
			$this->conexion = new conexion();
			$this->conexion->conectar();
        }
        function Editar_Empleado($id,$nrodocumento,$nombre,$apepat,$apemat,$fecnacimiento,$celular,$email,$direccion,$estado){
			$sql = "call PA_EDITAR_EMPLEADO('$id','$nrodocumento','$nombre','$apepat','$apemat','$fecnacimiento','$celular','$email','$direccion','$estado')";
			if ($resultado = $this->conexion->conexion->query($sql)){
				if ($row = mysqli_fetch_array($resultado)){
					return $id_usuario = trim($row[0]);
				}
			}

			$this->conexion->Cerrar_Conexion();
		}

		function Registrar_Empleado($nombre,$apepat,$apemat,$fechanacimiento,$nrodocumento,$movil,$direccion,$email){
			$sql = "call PA_REGISTRAR_EMPLEADO('$nombre','$apepat','$apemat','$fechanacimiento','$nrodocumento','$movil','$direccion','$email')";
			if ($resultado = $this->conexion->conexion->query($sql)){
					if ($row = mysqli_fetch_array($resultado)){
						return $id_usuario = trim($row[0]);
					}
			}

			$this->conexion->Cerrar_Conexion();
		}
		function listar_empleado(){
			$sql = "call PA_LISTAR_EMPLEADO()";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_assoc($consulta)) {
					$arreglo["data"][] = $consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
		}		
	}
?>