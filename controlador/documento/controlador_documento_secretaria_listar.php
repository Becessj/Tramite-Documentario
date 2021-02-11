<?php
    require '../../modelo/modelo_documento.php';
	$MC = new Modelo_documento();
    $txtidarea    = htmlspecialchars($_POST['txtidarea'],ENT_QUOTES,'UTF-8');
    $combo_estado = htmlspecialchars($_POST['combo_estado'],ENT_QUOTES,'UTF-8');
	$consulta = $MC->listar_documentos($txtidarea,$combo_estado);
	if ($consulta) {
		echo json_encode($consulta);
	}else{
		echo '{
		    "sEcho": 1,
		    "iTotalRecords": "0",
		    "iTotalDisplayRecords": "0",
		    "aaData": []
		}';
	}
?>
