<?php 
include_once("conexion.php");
include_once("points.php");

$pagina = $_GET['pag'];
$gamaid = $_GET['id'];

$querybuscar = mysqli_query($conn, "SELECT * FROM tbl_points WHERE id_points=$gamaid");
 
while($mostrar = mysqli_fetch_array($querybuscar))
{
	$gamanom 	= $mostrar['name_points'];
	$gamaid 	= $mostrar['id_points'];
    $gamamin 	= $mostrar['points'];
    $param      = $mostrar['parameters'];
}
?>
<html>
<head>    
		<title>Points</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="caja_popup2">
  <form class="contenedor_popup" method="POST">
        <table>
		<tr><th colspan="2">Modificar puntos</th></tr>
            <tr> 
                <td>Nombre</td>
                <td><input type="text" name="txtnom" value="<?php echo $gamanom;?>" required></td>
            <tr> 
                <td>Puntos</td>
                <td><input type="text" name="txtmin" value="<?php echo $gamamin;?>" required></td>
            </tr>  <tr> 
                <td>Parámetros</td>
                <td><input type="text" name="txtmin1" value="<?php echo $param;?>" required></td>
            </tr>
            <tr>
				
                <td colspan="2">
				 <?php echo "<a href=\"points.php?pag=$pagina\">Cancelar</a>";?>
				<input type="submit" name="btnmodificar" value="Modificar" onClick="javascript: return confirm('¿Deseas modificar este parámetro?');">
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
    $min2 = $_POST['txtmin1'];
      
    $querymodificar = mysqli_query($conn, "UPDATE tbl_points SET name_points='$nom1',points='$min1',parameters='$min2' WHERE id_points=$gamaid");
	echo "<script>window.location= 'points.php?pag=$pagina' </script>";
    
}
?>
	