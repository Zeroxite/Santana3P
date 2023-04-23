<?php
include_once("conexion.php");

$pagina = $_GET['pag'];
$gamaid = $_GET['id'];

mysqli_query($conn, "DELETE FROM tbl_points WHERE id_points=$gamaid");
 
header("Location:points.php?pag=$pagina");

?>