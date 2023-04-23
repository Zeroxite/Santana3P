<?php
include_once("conexion.php");

$pagina = $_GET['pag'];
$tempid = $_GET['id'];

mysqli_query($conn, "DELETE FROM tbl_season_offers WHERE id_sf=$tempid");
 
header("Location:temporadas.php?pag=$pagina");

?>