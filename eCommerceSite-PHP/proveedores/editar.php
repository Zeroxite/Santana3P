<?php 
include_once("conexion.php");
include_once("proveedores.php");

$pagina = $_GET['pag'];
$provid = $_GET['id'];

$querybuscar = mysqli_query($conn, "SELECT * FROM proveedores WHERE id=$provid");
 
while($mostrar = mysqli_fetch_array($querybuscar))
{
	$provnom 	= $mostrar['nom'];
	$provid 	= $mostrar['id'];
    $provdir 	= $mostrar['dir'];
	$provtel 	= $mostrar['tel'];
    $provcorreo = $mostrar['email'];
    $provprecio = $mostrar['precio'];
	$provprod 	= $mostrar['producto'];
}
?>
<html>
<head>    
		<title>Proveedores</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="caja_popup2">
  <form class="contenedor_popup" method="POST">
        <table>
		<tr><th colspan="2">Modificar proveedor</th></tr>
            <tr> 
                <td>Nombre</td>
                <td><input type="text" name="txtnom" value="<?php echo $provnom;?>" required></td>
            <tr> 
                <td>Dirección</td>
                <td><input type="text" name="txtdir" value="<?php echo $provdir;?>" required></td>
            </tr>
			  <tr> 
                <td>Telefono</td>
                <td><input type="number" name="txttel" value="<?php echo $provtel;?>" required></td>
            </tr>
			  <tr> 
                <td>Correo</td>
                <td><input type="text" name="txtcorreo" value="<?php echo $provcorreo;?>" required></td>
            </tr>
            <tr> 
                <td>Precio</td>
                <td><input type="number" name="txtprecio" value="<?php echo $provprecio;?>" required></td>
            </tr>
			  <tr> 
                <td>Producto</td>
                <td><input type="text" name="txtprod" value="<?php echo $provprod;?>" required></td>
            </tr>
            <tr>
				
                <td colspan="2">
				 <?php echo "<a href=\"proveedores.php?pag=$pagina\">Cancelar</a>";?>
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
	$dir1 = $_POST['txtdir'];
	$tel1 = $_POST['txttel'];
	$correo1 = $_POST['txtcorreo'];
    $precio1 = $_POST['txtprecio'];
	$prod1 = $_POST['txtprod'];
      
    $querymodificar = mysqli_query($conn, "UPDATE proveedores SET nom='$nom1',dir='$dir1',tel='$tel1',email='$correo1',precio='$precio1',producto='$prod1' WHERE id=$provid");
	echo "<script>window.location= 'proveedores.php?pag=$pagina' </script>";
    
}
?>
	