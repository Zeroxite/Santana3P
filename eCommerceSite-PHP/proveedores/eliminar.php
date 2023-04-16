<?php
include_once("conexion.php");

$pagina = $_GET['pag'];
$provid = $_GET['id'];

mysqli_query($conn, "DELETE FROM proveedores WHERE id=$provid");
 
header("Location:proveedores.php?pag=$pagina");

?>