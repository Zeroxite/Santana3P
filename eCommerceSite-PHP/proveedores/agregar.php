<?php 
include_once("conexion.php"); 
include_once("proveedores.php");

$pagina = $_GET['pag'];
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
		<tr><th colspan="2" >Agregar proveedor</th></tr>
            <tr> 
                <td>Nombre</td>
                <td><input type="text" name="txtnom" autocomplete="off"></td>
            </tr>
            <tr> 
                <td>Dirección</td>
                <td><input type="text" name="txtdir" autocomplete="off"></td>
            </tr>
            <tr> 
                <td>Telefono</td>
                <td><input type="number" name="txttel" autocomplete="off"></td>
            </tr>
			  <tr> 
                <td>Correo</td>
                <td><input type="text" name="txtcorreo" autocomplete="off"></td>
            </tr>
            <tr> 
                <td>Precio</td>
                <td><input type="text" name="txtprecio" autocomplete="off"></td>
            </tr>
            <tr> 
                <td>Producto</td>
                <td><input type="text" name="txtprod" autocomplete="off"></td>
            </tr>
            <tr> 	
               <td colspan="2" >
				  <?php echo "<a href=\"proveedores.php?pag=$pagina\">Cancelar</a>";?>
				   <input type="submit" name="btnregistrar" value="Registrar" onClick="javascript: return confirm('¿Deseas registrar a este proveedor');">
			</td>
            </tr>
        </table>
    </form>
 </div>
</body>
</html>
<?php

		if(isset($_POST['btnregistrar']))
{   
	$vaiusu 	= $_POST['txtnom'];
    $vaidir 	= $_POST['txtdir'];
	$vaitel 	= $_POST['txttel'];
    $vaiemail 	= $_POST['txtcorreo'];
    $vaiprecio 	= $_POST['txtprecio'];
	$vaiprod 	= $_POST['txtprod'];

	$queryadd	= mysqli_query($conn, "INSERT INTO proveedores(nom,dir,tel,email,precio,producto) VALUES('$vaiusu','$vaidir','$vaitel','$vaiemail','$vaiprecio','$vaiprod')");
	
 	if(!$queryadd)
	{
		// echo "Error con el registro: ".mysqli_error($conn);
		 echo "<script>alert('Proveedor duplicado, intenta otra vez');</script>";
		 
	}else
	{
		echo "<script>window.location= 'proveedores.php?pag=1' </script>";
	}
}
?>


