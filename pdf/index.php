<?php
$fecha1=$_POST['fecha1'];
$f1 = date("d/m/Y", strtotime($fecha1));
$fecha2=$_POST['fecha2'];
$f2 = date("d/m/Y", strtotime($fecha2));
$opcion=$_POST['combo_estado'];
include 'reportepdf.php';
require 'conexion.php';
if(isset($_POST['generar_pdf']))
{
	$query = "SELECT documento_id, doc_dniremitente, doc_nombreremitente, doc_apepatremitente, doc_apematremitente, tupa_descripcion, doc_estatus, doc_fecharegistro  FROM documento d, tupa t where d.tupa_id = t.tupa_id and d.doc_fecharegistro BETWEEN '$fecha1' AND '$fecha2'  and documento_id like 'MPU%' and doc_estatus LIKE '%$opcion' ORDER BY documento_id";
	$resultado = $mysqli->query($query);
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(70,6,'NRO SEGUIMIENTO',1,0,'C',1);
	$pdf->Cell(20,6,'DNI',1,0,'C',1);
	$pdf->Cell(70,6,'NOMBRES',1,1,'C',1);
	$pdf->Cell(70,6,'PATERNO',1,1,'C',1);
	$pdf->Cell(70,6,'MATERNO',1,1,'C',1);
	$pdf->Cell(70,6,'TUPA',1,1,'C',1);
	$pdf->Cell(70,6,'ESTADO',1,1,'C',1);
	$pdf->Cell(70,6,'FECHA',1,1,'C',1);
	$pdf->SetFont('Arial','',10);
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(70,6,utf8_decode($row['documento_id']),1,0,'C');
		$pdf->Cell(20,6,$row['doc_dniremitente'],1,0,'C');
		$pdf->Cell(70,6,utf8_decode($row['doc_nombreremitente']),1,1,'C');
		$pdf->Cell(70,6,utf8_decode($row['doc_apepatremitente']),1,0,'C');
		$pdf->Cell(20,6,$row['doc_apematremitente'],1,0,'C');
		$pdf->Cell(70,6,utf8_decode($row['tupa_descripcion']),1,1,'C');
		$pdf->Cell(70,6,utf8_decode($row['doc_estatus']),1,0,'C');
		$pdf->Cell(20,6,$row['doc_fecharegistro'],1,0,'C');
	}
	$pdf->Output('D');
}
?>