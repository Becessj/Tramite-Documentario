<?php

require "../PHPMailer/PHPMailerAutoload.php";



function smtpmailer($to, $from, $from_name, $subject, $body){

    $mail = new PHPMailer();

    $mail->IsSMTP();

    $mail->SMTPAuth = true; 



    $mail->SMTPSecure = 'ssl'; 

    $mail->Host = 'tramitedocumentario.muniurubamba.gob.pe';

    $mail->Port = "465";  

    $mail->Username = 'tramitedoc@tramitedocumentario.muniurubamba.gob.pe';

    $mail->Password = '6ck]iRUQ0^H}';

    $mail->IsHTML(true);

    $mail->From="tramitedocumentario@muniurubamba.gob.pe";

    $mail->FromName=$from_name;

    $mail->Sender=$from;

    $mail->AddReplyTo($from, $from_name);

    $mail->Subject = $subject;

    $mail->Body = $body;

    $mail->AddAddress($to);

    if(!$mail->Send())

    {

        $error ="Please try Later, Error Occured while Processing...";

        return $error; 

    }

    else 

    {

        $error = "Thanks You !! Your email is sent.";  

        return $error;

    }

}

$id_seguimiento = $_POST["id_seguimiento"];

$nro_tramite    = $_POST["nro_tramite"];

$tipo_tramite   = $_POST["tipo_tramite"];

$txtemail       = $_POST["txtemail"];



$mensaje = "

<table border='1' cellspacing='0' cellpadding='5'>

    <tr>

      <td colspan='2' style='color:white;background-color:#000000;text-align:center;'><b>DATOS TR&Aacute;MITE</b></td>

    </tr>

    <tr>

      <td>NRO SEGUIMIENTO: </td><td>$id_seguimiento</td>

    </tr>

    <tr>

      <td>NRO DOCUMENTO: </td><td>$nro_tramite</td>

    </tr>

    <tr>

      <td>TIPO DOCUMENTO: </td><td>$tipo_tramite</td>

    </tr>
      <td>VER SEGUIMIENTO: </td><td>https://tramitedocumentario.muniurubamba.gob.pe/consulta</td>
</table>

";

$to1   = $txtemail;

$from1 = 'tramitedocumentario@muniurubamba.gob.pe';

$name1 = 'MUNICIPALIDAD PROVINCIAL DE URUBAMBA | TRAMITE DOCUMENTARIO';

$subj1 = 'Datos para el Seguimento Virtual' ;

$msg1 = $mensaje;

$error=smtpmailer($to1,$from1, utf8_decode($name1),$subj1, utf8_decode($msg1));

    echo $correo;

?>