<?php 
include_once("conexion.php");
include_once("Gama.php");

$pagina = $_GET['pag'];
$gamaid = $_GET['id'];

$querybuscar = mysqli_query($conn, "SELECT * FROM tbl_gama WHERE id_categoria=$gamaid");
 
while($mostrar = mysqli_fetch_array($querybuscar))
{
	$gamanom 	= $mostrar['nombre'];
	$gamaid 	= $mostrar['id_categoria'];
    $gamamin 	= $mostrar['min_range'];
}
?>
<html>
<head>    
		<title>Gama</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="caja_popup2">
  <form class="contenedor_popup" method="POST">
        <table>
		<tr><th colspan="2">Modificar gama</th></tr>
            <tr> 
                <td>Nombre</td>
                <td><input type="text" name="txtnom" value="<?php echo $gamanom;?>" required></td>
            <tr> 
                <td>Minimo de puntos</td>
                <td><input type="text" name="txtmin" value="<?php echo $gamamin;?>" required></td>
            </tr>
            <tr>
				
                <td colspan="2">
				 <?php echo "<a href=\"Gama.php?pag=$pagina\">Cancelar</a>";?>
				<input type="submit" name="btnmodificar" value="Modificar" onClick="javascript: return confirm('¿Deseas modificar este proveedor?');">
				</td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>

<?php
	
	if(isset($_POST['btnmodificar']))
{    
	$nom1 = $_POST['txtnom'];
	$min1 = $_POST['txtmin'];
      
    $querymodificar = mysqli_query($conn, "UPDATE tbl_gama SET nombre='$nom1',min_range='$min1' WHERE id_categoria=$gamaid");
	echo "<script>window.location= 'Gama.php?pag=$pagina' </script>";
    
}
?>
	