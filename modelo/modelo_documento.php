<?php
	class Modelo_documento
	{
		private $conexion;
		function __construct()
		{
		    require_once 'modelo_conexion.php';
		    $this->conexion = new conexion();
			$this->conexion->conectar();
		}
		function registrar_derivacion_finalizacion_con_archivo($txt_iddocumento,$txt_idareaactual,$txt_idareadestino,$txt_descripcion,$txt_estado,$txt_idusuario,$txt_idmovimiento,$archivo){
			$sql = "call PA_REGISTRAR_DERIVAR_FINALIZAR_CON_ARCHIVO('$txt_iddocumento','$txt_idareaactual','$txt_idareadestino','$txt_descripcion','$txt_estado','$txt_idusuario','$txt_idmovimiento','$archivo')";
			if ($resultado = $this->conexion->conexion->query($sql)){
				return 1;
			}
			else{
				return 0;
			}
			$this->conexion->cerrar();
		}
		function registrar_aceptar_finalizar($txt_idmovimiento,$txt_iddocumento,$txt_asunto,$txt_tipo){
			$sql = "call PA_REGISTRAR_ACEPTAR_RECHAZAR('$txt_idmovimiento','$txt_iddocumento','$txt_asunto','$txt_tipo')";
			if ($resultado = $this->conexion->conexion->query($sql)){
				return 1;
			}
			else{
				return 0;
			}
			$this->conexion->cerrar();
		}
		function registrar_derivacion_finalizacion($txt_iddocumento,$txt_idareaactual,$txt_idareadestino,$txt_descripcion,$txt_estado,$txt_idusuario,$txt_idmovimiento){
			$sql = "call PA_REGISTRAR_DERIVAR_FINALIZAR('$txt_iddocumento','$txt_idareaactual','$txt_idareadestino','$txt_descripcion','$txt_estado','$txt_idusuario','$txt_idmovimiento')";
			if ($resultado = $this->conexion->conexion->query($sql)){
				return 1;
			}
			else{
				return 0;
			}
			$this->conexion->cerrar();
		}
		function combo_area_derivar($area_id){
			$sql = "call PA_COMBOAREA_DERIVAR('$area_id')";	
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_array($consulta)) {
					$arreglo[] = $consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();	
			}
		}
		function registrar_documento_interno($txtdni,$txtnombre,$txtapepat,$txtapemat,$txtcelular,$txtemail,$txt_direccion,$txt_ruc,$txt_empresa,$cmb_tipodocumento,$txt_nrodocumentos,$txt_folios,$txt_asunto,$archivo,$txt_representacion,$cmb_procedenciadocumento,$cmb_area_destino){
			$sql = "call PA_REGISTRAR_DOCUMENTO_INTERNO('$txtdni','$txtnombre','$txtapepat','$txtapemat','$txtcelular','$txtemail','$txt_direccion','$txt_ruc','$txt_empresa','$cmb_tipodocumento','$txt_nrodocumentos','$txt_folios','$txt_asunto','$archivo','$txt_representacion','$cmb_procedenciadocumento','$cmb_area_destino')";
			if ($resultado = $this->conexion->conexion->query($sql)){
				if ($row = mysqli_fetch_array($resultado)){
					return $id_usuario = trim($row[0]);
				}
			}
			$this->conexion->cerrar();
		}
		function listar_documentos_seguimiento($idseguimiento){
			$sql = "call PA_LISTAR_DOCUMENTOS_SEGUIMIENTO('$idseguimiento')";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_assoc($consulta)) {
					$arreglo["data"][] = $consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
		}
		function listar_documentos_admin($txtidarea,$combo_estado){
			$sql = "call PA_LISTAR_DOCUMENTOS_ADMIN('$txtidarea','$combo_estado')";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_assoc($consulta)) {
					$arreglo["data"][] = $consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
		}
		function listar_documentos($txtidarea,$combo_estado){
			$sql = "call PA_LISTAR_DOCUMENTOS_SECRE('$txtidarea','$combo_estado')";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_assoc($consulta)) {
					$arreglo["data"][] = $consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
		}
		function buscar_documento_seguimiento_accion($idmovimiento){
			$sql = "call PA_BUSCARDOCUMENTO_SEGUIMIENTO_ACCION('$idmovimiento')";	
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_array($consulta)) {
					$arreglo[] = $consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();	
			}
		}
		function buscar_documento_seguimiento($iddocumento){
			$sql = "call PA_BUSCARDOCUMENTO_SEGUIMIENTO('$iddocumento')";	
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_array($consulta)) {
					$arreglo[] = $consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();	
			}
		}
		function buscar_documento_externo($txtnrodocumento,$cbm_anio){
			$sql = "call PA_BUSCARDOCUMENTO_EXTERNO('$txtnrodocumento','$cbm_anio')";	
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_array($consulta)) {
					$arreglo[] = $consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();	
			}
		}
		function combo_tipodocumento(){
			$sql = "call PA_COMBOTIPODOCUMENTO";	
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_array($consulta)) {
					$arreglo[] = $consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();	
			}
		}
		function combo_tupa(){
			$sql = "call PA_COMBOTUPA";	
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_array($consulta)) {
					$arreglo[] = $consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();	
			}
		}
		function registrar_documento_externo($txtdni,$txtnombre,$txtapepat,$txtapemat,$txtcelular,$txtemail,$txt_direccion,$txt_ruc,$txt_empresa,$cmb_tupa,$txt_nrodocumentos,$txt_folios,$txt_asunto,$archivo,$txt_representacion){
			$sql = "call PA_REGISTRAR_DOCUMENTO('$txtdni','$txtnombre','$txtapepat','$txtapemat','$txtcelular','$txtemail','$txt_direccion','$txt_ruc','$txt_empresa','$cmb_tupa','$txt_nrodocumentos','$txt_folios','$txt_asunto','$archivo','$txt_representacion')";
			if ($resultado = $this->conexion->conexion->query($sql)){
				if ($row = mysqli_fetch_array($resultado)){
					return $id_usuario = trim($row[0]);
				}
			}
			$this->conexion->cerrar();
		}
	}
?>