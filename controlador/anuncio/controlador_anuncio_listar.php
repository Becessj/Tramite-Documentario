<?php
    require '../../modelo/modelo_anuncio.php';
	$MA = new Modelo_Anuncio();
	$consulta = $MA->listar_anuncio();
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
