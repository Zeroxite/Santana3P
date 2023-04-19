<?php 
include_once("conexion.php"); 
include_once("Gama.php");

$pagina = $_GET['pag'];
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
		<tr><th colspan="2" >Agregar gama</th></tr>
            <tr> 
                <td>Nombre</td>
                <td><input type="text" name="txtnombre" autocomplete="off"></td>
            </tr>
            <tr> 
                <td>Puntos mínimos</td>
                <td><input type="text" name="txtmin" autocomplete="off"></td>
            </tr>
            <tr> 	
               <td colspan="2" >
				  <?php echo "<a href=\"Gama.php?pag=$pagina\">Cancelar</a>";?>
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
	$vainom 	= $_POST['txtnombre'];
    $vaimin 	= $_POST['txtmin'];

	$queryadd	= mysqli_query($conn, "INSERT INTO tbl_gama(nombre,min_range) VALUES('$vainom','$vaimin')");
	
 	if(!$queryadd)
	{
		// echo "Error con el registro: ".mysqli_error($conn);
		 echo "<script>alert('Gama duplicada, intenta otra vez');</script>";
		 
	}else
	{
		echo "<script>window.location= 'Gama.php?pag=1' </script>";
	}
}
?>


