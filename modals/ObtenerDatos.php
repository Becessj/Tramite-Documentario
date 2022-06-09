<?php
require ("DBController.php");
$dbController = new DBController();
// Controlar las tildes y ñ en los resultados desde MySQL

$query = "SELECT * FROM modal_contenido WHERE Modal = '" . $_GET["my_modal"] . "'";
$result = $dbController->runQuery($query);
if(!empty($result)) 
{
?>
<img src='imagenes/<?php echo $result[0]["Img"]?>' />
<div class='modal-text'><?php echo $result[0]["Contenido_modal"]?></div>
<?php 
    }
?>