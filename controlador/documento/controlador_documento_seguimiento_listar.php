<?php
    require '../../modelo/modelo_documento.php';
	$MC = new Modelo_documento();
    $idseguimiento    = htmlspecialchars($_POST['idseguimiento'],ENT_QUOTES,'UTF-8');
	$consulta = $MC->listar_documentos_seguimiento($idseguimiento);
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
