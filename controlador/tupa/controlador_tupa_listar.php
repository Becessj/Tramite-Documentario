<?php
    require '../../modelo/modelo_tupa.php';
	$MT = new Modelo_TUPA();
	$consulta = $MT->listar_tupa();
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