<?php 
include_once("conexion.php");
include_once("temporadas.php");

$pagina = $_GET['pag'];
$tempid = $_GET['id'];

$querybuscar = mysqli_query($conn, "SELECT * FROM tbl_season_offers WHERE id_sf=$tempid");
 
while($mostrar = mysqli_fetch_array($querybuscar))
{
	$tempid 	= $mostrar['id_sf'];
    $tempdesc 	= $mostrar['description'];
	$tempini 	= $mostrar['date_start'];
    $tempend    = $mostrar['date_end'];
	$tempdisc 	= $mostrar['discounts'];
    $tempcat    = $mostrar['categoria'];
}
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
		<tr><th colspan="2">Modificar ofertas</th></tr>
            <tr> 
                <td>Descripción</td>
                <td><input type="text" name="txtdesc" value="<?php echo $tempdesc;?>" required></td>
            <tr> 
                <td>Fecha de inicio</td>
                <td><input type="date" name="dateini" value="<?php echo $tempini;?>" required></td>
            </tr>
			  <tr> 
                <td>Fecha de cierre</td>
                <td><input type="date" name="dateend" value="<?php echo $tempend;?>" required></td>
            </tr>
			<tr> 
                <td>Descuento</td>
                <td><input type="text" name="txtdisc" value="<?php echo $tempdisc;?>" required></td>
            </tr>
            <tr> 
                <td>Categoria</td>
                <td>
            <select name="comboCategoria" onChange="combo(this, 'demo')" style='width:20%'>
            <option selected="true" value="<?php echo $tempcat;?>" disabled="disabled"><?php echo $tempcat;?></option>
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
				
                <td colspan="2">
				 <?php echo "<a href=\"temporadas.php?pag=$pagina\">Cancelar</a>";?>
				<input type="submit" name="btnmodificar" value="Modificar" onClick="javascript: return confirm('¿Deseas modificar esta temporada?');">
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
	$desc1 = $_POST['txtdesc'];
	$ini1 = $_POST['dateini'];
	$end1 = $_POST['dateend'];
	$disc1 = $_POST['txtdisc'];
    $cate = $_POST['comboCategoria'];  
    $querymodificar = mysqli_query($conn, "UPDATE tbl_season_offers SET description='$desc1',date_start='$ini1',date_end='$end1',discounts='$disc1',categoria='$cate' WHERE id_sf=$tempid");
	echo "<script>window.location= 'temporadas.php?pag=$pagina' </script>";
    
}
?>
	