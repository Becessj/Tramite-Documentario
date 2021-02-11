<?php
    require '../../modelo/modelo_area.php';
	$MA = new Modelo_Area();
	$consulta = $MA->listar_area();
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
