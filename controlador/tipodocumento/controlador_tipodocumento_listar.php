<?php
    require '../../modelo/modelo_tipodocumento.php';
	$MT = new Modelo_Tipodocumento();
	$consulta = $MT->listar_tipodocumento();
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
