<?php 
include_once("conexion.php"); 
include_once("points.php");

$pagina = $_GET['pag'];
?>
<html>
<head>    
		<title>Parámetros</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="caja_popup2"> 
  <form class="contenedor_popup" method="POST">
        <table>
		<tr><th colspan="2" >Agregar parámetro</th></tr>
            <tr> 
                <td>Nombre</td>
                <td><input type="text" name="txtnombre" autocomplete="off"></td>
            </tr>
            <tr> 
                <td>Puntos asignados</td>
                <td><input type="text" name="txtmin" autocomplete="off"></td>
            </tr><tr> 
                <td>Parámetros</td>
                <td><input type="text" name="txtmin1" autocomplete="off"></td>
            </tr>
            <tr> 	
               <td colspan="2" >
				  <?php echo "<a href=\"points.php?pag=$pagina\">Cancelar</a>";?>
				   <input type="submit" name="btnregistrar" value="Registrar" onClick="javascript: return confirm('¿Deseas registrar a este parámetro');">
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
	$param      =$_POST['txtmin1'];
    $vaimin 	= $_POST['txtmin'];

	$queryadd	= mysqli_query($conn, "INSERT INTO tbl_points(name_points,parameters,points) VALUES('$vainom','$param','$vaimin')");
	
 	if(!$queryadd)
	{
		// echo "Error con el registro: ".mysqli_error($conn);
		 echo "<script>alert('Puntos duplicados, intenta otra vez');</script>";
		 
	}else
	{
		echo "<script>window.location= 'points.php?pag=1' </script>";
	}
}
?>


