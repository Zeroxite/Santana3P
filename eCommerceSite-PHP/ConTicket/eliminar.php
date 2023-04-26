<?php
include_once("conexion.php");

$pagina = $_GET['pag'];
$tickid = $_GET['id'];

mysqli_query($conn, "DELETE FROM ticket WHERE id_ticket=$tickid");
 
header("Location:tickets.php?pag=$pagina");

?>