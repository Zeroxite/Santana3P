<?php 
include_once("conexion.php"); 
include_once("temporadas.php");

$pagina = $_GET['pag'];
?>
<html>
<head>    
		<title>Ofertas por temporada</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="caja_popup2"> 
  <form class="contenedor_popup" method="POST">
        <table>
		<tr><th colspan="2" >Agregar oferta</th></tr>
            <tr> 
                <td>Descripción</td>
                <td><input type="text" name="txtdesc" autocomplete="off"></td>
            </tr>
            <tr> 
                <td>Fecha de inicio</td>
                <td><input type="date" name="dateini" autocomplete="off"></td>
            </tr>
            <tr> 
                <td>Fecha de cierre</td>
                <td><input type="date" name="dateend" autocomplete="off"></td>
            </tr>
			  <tr> 
                <td>Descuento</td>
                <td><input type="number" name="txtdisc" autocomplete="off"></td>
            </tr>
            <tr> 	
               <td colspan="2" >
				  <?php echo "<a href=\"temporadas.php?pag=$pagina\">Cancelar</a>";?>
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
	$vaidesc 	= $_POST['txtdesc'];
    $vaiini 	= $_POST['dateini'];
	$vaiend 	= $_POST['dateend'];
    $vaidisc 	= $_POST['txtdisc'];

	$queryadd	= mysqli_query($conn, "INSERT INTO tbl_season_offers(description,date_start,date_end,discounts) VALUES('$vaidesc','$vaiini','$vaiend','$vaidisc')");
	
 	if(!$queryadd)
	{
		// echo "Error con el registro: ".mysqli_error($conn);
		 echo "<script>alert('Oferta duplicada, intenta otra vez');</script>";
		 
	}else
	{
		echo "<script>window.location= 'temporadas.php?pag=1' </script>";
	}
}
?>


