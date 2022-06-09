<?php
	class Modelo_usuario
	{
		private $conexion;
		function __construct()
		{
		    require_once 'modelo_conexion.php';
		    $this->conexion = new conexion();
			$this->conexion->conectar();
		}
		function actualizar_foto($txt_idtrabajador_usuario,$archivo){
			$sql = "call PA_EDITARFOTO('$txt_idtrabajador_usuario','$archivo')";
			if ($resultado = $this->conexion->conexion->query($sql)){
				return 1;
			}
			else{
				return 0;
			}
			$this->conexion->cerrar();
		}
		function editar_clave($idusuario,$clave){
			$sql = "call PA_EDITARCLAVE('$idusuario','$clave')";
			if ($resultado = $this->conexion->conexion->query($sql)){
				return 1;
			}
			else{
				return 0;
			}
			$this->conexion->cerrar();
		}
		function Verificar_usuario($usuario,$pass){
			$sql = "call PA_VERIFICARUSUARIO('$usuario')";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_array($consulta)) {
					if(password_verify($pass, $consulta_VU["usu_contra"]))
                    {
                        $arreglo[] = $consulta_VU;
                    }
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
		}
		function buscar_administrador($buscar){
			$sql = "call PA_VERIFICARUSUARIO('$buscar')";	
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {

				while ($consulta_VU = mysqli_fetch_array($consulta)) {
					$arreglo[] = $consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();	
			}
		}
		function editar_cuenta($usuario,$original,$nueva){
			$sql = "call PA_EDITARCUENTA('$usuario','$original','$nueva')";
			if ($resultado = $this->conexion->conexion->query($sql)){
				return 1;
			}
			else{
				return 0;
			}
			$this->conexion->cerrar();
		}
		function listar_usuario(){
			$sql = "call PA_LISTAR_USUARIO";

			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {

				while ($consulta_VU = mysqli_fetch_assoc($consulta)) {
					$arreglo["data"][] = $consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
		}
		function Modificar_Estatus_Usuario($idusuario,$estatus){
			$sql = "call PA_MODIFICAR_ESTATUS_USUARIO('$idusuario','$estatus')";
			if ($resultado = $this->conexion->conexion->query($sql)){
				return 1;
			}
			else{
				return 0;
			}
			$this->conexion->cerrar();
		}
		function listar_area_editar($idarea){
			$sql = "call PA_LISTARAREA_USUARIO('$idarea')";	
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_array($consulta)) {
					$arreglo[] = $consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();	
			}
		}
		function combo_area(){
			$sql = "call PA_COMBOAREA";	
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_array($consulta)) {
					$arreglo[] = $consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();	
			}
		}
		function combo_empleado(){
			$sql = "call PA_COMBOEMPLEADO";	
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_array($consulta)) {
					$arreglo[] = $consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();	
			}
		}
		function editar_usuario($id_usuario,$cmb_area){
			$sql = "call PA_EDITAR_USUARIO('$id_usuario','$cmb_area')";
			if ($resultado = $this->conexion->conexion->query($sql)){
				return 1;
			}
			else{
				return 0;
			}
			$this->conexion->cerrar();
		}
		function registrar_usuario($usuario,$clave,$empleado,$area,$rol){
			$sql = "call PA_REGISTRAR_USUARIO('$usuario','$clave','$empleado','$area','$rol')";
			if ($resultado = $this->conexion->conexion->query($sql)){
				if ($row = mysqli_fetch_array($resultado)){
					return $id_usuario = trim($row[0]);
				}
			}
			$this->conexion->cerrar();
		}

		function trear_administrador_widget(){
			$sql = "call PA_DASHBOARD_ADMINISTRADOR()";	
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {

				while ($consulta_VU = mysqli_fetch_array($consulta)) {
					$arreglo[] = $consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();	
			}
		}

		function trear_area_widget($idarea){
			$sql = "call PA_DASHBOARD_ADMINISTRADOR_AREA('$idarea')";	
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {

				while ($consulta_VU = mysqli_fetch_array($consulta)) {
					$arreglo[] = $consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();	
			}
		}
	}
?>