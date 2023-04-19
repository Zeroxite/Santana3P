<?php
include_once("conexion.php");

$pagina = $_GET['pag'];
$gamaid = $_GET['id'];

mysqli_query($conn, "DELETE FROM tbl_gama WHERE id_categoria=$gamaid");
 
header("Location:Gama.php?pag=$pagina");

?>