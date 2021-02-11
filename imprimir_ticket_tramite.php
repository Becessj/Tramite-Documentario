<?php


require_once '../conexion.php';
$codigo=htmlspecialchars($_GET['codigo'],ENT_QUOTES,'UTF-8');
$query="SELECT
documento.documento_id,
documento.doc_dniremitente,
documento.doc_nombreremitente,
documento.doc_apepatremitente,
documento.doc_apematremitente,
documento.doc_celularremitente,
documento.doc_emailremitente,
documento.doc_direccionremitente,
documento.doc_representacion,
documento.doc_ruc,
documento.doc_empresa,
documento.tipodocumento_id,
documento.doc_nrodocumento,
documento.doc_folio,
documento.doc_asunto,
documento.doc_archivo,
documento.doc_fecharegistro,
documento.area_id,
documento.doc_estatus,
tipo_documento.tipodo_descripcion as s,
IF(documento.tipodocumento_id!=0, tipo_documento.tipodo_descripcion, tupa.tupa_descripcion)  as tipodo_descripcion


FROM
documento
INNER JOIN tipo_documento ON documento.tipodocumento_id = tipo_documento.tipodocumento_id
INNER JOIN tupa ON documento.tupa_id = tupa.tupa_id
where
documento.doc_nrodocumento = '".$codigo."'";
$resultado = $mysqli->query($query);
while($row = $resultado->fetch_assoc()){
$html.='<style>
@page {
    margin: 10mm;
    margin-header: 0mm;
    margin-footer: 0mm;
}

</style>

<table>
<tr><td style="text-align:center;font-weight:bold;font-size:12px"><span>MUNICIPALIDAD DISTRITAL DE SAYLLA | TRAMITE DOCUMENTARIO</span></td></tr>
<tr><td style="text-align:center;font-weight:bold"><img src="logo.png" style="width:50%"></td></tr>
</table>
<span style="font-size:12px;"><b>N&uacute;mero de expediente:
    </b> '.$row['documento_id'].'
</span><br>
<span style="font-size:12px;"><b>N&uacute;mero de tr&aacute;mite:
    </b> '.$row['doc_nrodocumento'].'
</span><br>
<span style="font-size:12px"><b>Fecha - Hora:
    </b> '. date('d-m-Y H:i:s', strtotime($row['doc_fecharegistro'])).'
</span><br>
<span style="font-size:12px"><b>Tipo:
    </b> '.strtoupper(substr(utf8_encode($row['tipodo_descripcion']),0,32)).'
</span><br>
<span style="font-size:12px"><b>DNI:
    </b> '.$row['doc_dniremitente'].'
</span><br>
<span style="font-size:12px"><b>Remitente:<br>
    </b> '.strtoupper(substr(utf8_encode($row['doc_nombreremitente']),0,32)).' '.strtoupper(substr(utf8_encode($row['doc_apepatremitente']),0,32)).' '.strtoupper(substr(utf8_encode($row['doc_apematremitente']),0,32)).'
</span><br><hr>
<table class="items" width="100%" cellpadding="8">
<thead>
	<tr>		
        <td class="barcodecell" align="center"><barcode code="'.$row['documento_id'].'" type="QR" class="barcode" size="1.2" error="M" disableborder="1"/></td>
	</tr>
</thead>

</table>
';
}
require_once __DIR__ . '/../vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf(
['mode' => 'UTF-8', 'format' => [80,130]]
);

$mpdf->WriteHTML($html);
$mpdf->SetTitle('TICKET TRAMITE DOCUMENTARIO');
$mpdf->Output();