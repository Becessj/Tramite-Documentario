<?php
    require '../../modelo/modelo_usuario.php';
	$MC = new Modelo_usuario();
	$consulta = $MC->listar_usuario();
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
