<?
include('conexion.php');//CONEXION A LA BD

$fecha1=$_POST['fecha1'];
$f1 = date("d/m/Y", strtotime($fecha1));
$fecha2=$_POST['fecha2'];
$f2 = date("d/m/Y", strtotime($fecha2));
$opcion=$_POST['combo_estado'];

if(isset($_POST['generar_reporte']))
{
	$consulta=$conexion->query("SELECT documento_id, doc_dniremitente, doc_nombreremitente, doc_apepatremitente, doc_apematremitente, tupa_descripcion, doc_estatus, doc_fecharegistro  FROM documento d, tupa t where d.tupa_id = t.tupa_id and d.doc_fecharegistro BETWEEN '$fecha1' AND '$fecha2'  and documento_id like 'MPU%' and doc_estatus LIKE '%$opcion' ORDER BY documento_id");

    if(!empty($consulta)) {
        //El nombre del fichero tendrá el nombre de "usuarios_dia-mes-anio hora_minutos_segundos.csv"
        $ficheroExcel="tramites ".$f1." al ".$f2.".csv";
        
        //Indicamos que vamos a tratar con un fichero CSV
        header("Content-type: text/csv");
        header("Content-Disposition: attachment; filename=".$ficheroExcel);
        
        // Vamos a mostrar en las celdas las columnas que queremos que aparezcan en la primera fila, separadas por ; 
        echo "\t\t\t\tNUMERO DE SEGUIMIENTO;\t\t\t\t\t\tDNI;\t\t\t\t\t\tNOMBRES;\t\t\t\t\t\tA. PATERNO;\t\t\t\t\t\tA. MATERNO;\t\t\t\t\t\tTUPA; ESTADO;\t\t\t\t\t\tFECHA REGISTRO\n";    
        // Recorremos la consulta SQL y lo mostramos
        while($tramite=$consulta->fetch_array()){
                echo "\t\t\t\t\t".$tramite['documento_id']. "\t\t\t\t\t".";";
                echo "\t   ".$tramite['doc_dniremitente']."\t\t\t\t\t".";";
                echo "\t   ".$tramite['doc_nombreremitente']."\t\t\t\t\t".";";
                echo "\t   ".$tramite['doc_apepatremitente']."\t\t\t\t\t".";";
                echo "\t   ".$tramite['doc_apematremitente']."\t\t\t\t\t".";";
                echo "      ".$tramite['tupa_descripcion']."\t\t\t\t\t".";";
                echo "      ".$tramite['doc_estatus']."\t\t\t\t\t".";";
                echo "\t".$tramite['doc_fecharegistro']."\n";

        }                
    }else{
        echo "No hay datos a exportar";
    }
    //Para que se cree el Excel correctamente, hay que añadir la sentencia exit;
    exit;
}



?> 