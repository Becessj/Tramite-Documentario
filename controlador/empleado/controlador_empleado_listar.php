<?php
    require '../../modelo/modelo_empleado.php';
	$ME = new Modelo_Empleado();
	$consulta = $ME->listar_empleado();
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
