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
                <td>Categoria</td>
                <td>
            <select name="comboCategoria" style='width:20%'>
            <option selected="true" disabled="disabled">Seleccionar...</option>
            <option value ="Men">Men</option>
            <option value ="Women">Women</option>
            <option value ="Kids">Kids</option>
            <option value ="Electronics">Electronics</option>
            <option value ="Health and Household">Health and Household</option>
            <option value ="Todas">Todas</option>
            </select>
            </td>
            </tr>
            <tr> 	
               <td colspan="2" >
				  <?php echo "<a href=\"temporadas.php?pag=$pagina\">Cancelar</a>";?>
				   <input type="submit" name="btnregistrar" value="Registrar" onClick="javascript: return confirm('¿Deseas registrar a esta temporada');">
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
    $vaicat     = $_POST['comboCategoria'];

	$queryadd	= mysqli_query($conn, "INSERT INTO tbl_season_offers(description,date_start,date_end,discounts,categoria) VALUES('$vaidesc','$vaiini','$vaiend','$vaidisc','$vaicat')");
	
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


