<?php 
include_once("conexion.php");
include_once("temporadas.php");

$pagina = $_GET['pag'];
$tempid = $_GET['id'];

$querybuscar = mysqli_query($conn, "SELECT * FROM tbl_season_offers WHERE id=$tempid");
 
while($mostrar = mysqli_fetch_array($querybuscar))
{
	$tempid 	= $mostrar['id'];
    $tempdesc 	= $mostrar['description'];
	$tempini 	= $mostrar['date_start'];
    $tempend    = $mostrar['date_end'];
    $tempdisc   = $mostrar['discount'];
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
		<tr><th colspan="2">Ver ofertas</th></tr>
			   <tr> 
                <td>ID: </td>
                <td><?php echo $tempid;?></td>
            </tr>
        
            <tr> 
                <td>Descripción: </td>
                <td><?php echo $tempdesc;?></td>
            </tr>
			  <tr> 
                <td>Fecha de inicio: </td>
                <td><?php echo $provtel;?></td>
            </tr>
			  <tr> 
                <td>Fecha de cierre: </td>
                <td><?php echo $tempend;?></td>
            </tr>
            <tr> 
                <td>Descuento: </td>
                <td><?php echo $tempdisc;?></td>
            </tr>
            <tr>
				
                <td colspan="2">
				 <?php echo "<a href=\"temporadas.php?pag=$pagina\">Regresar</a>";?>
				</td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>


	