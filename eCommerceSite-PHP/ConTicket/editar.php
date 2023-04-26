<?php 
include_once("conexion.php");
include_once("tickets.php");

$pagina = $_GET['pag'];
$tickid = $_GET['id'];

$querybuscar = mysqli_query($conn, "SELECT * FROM ticket WHERE id_ticket=$tickid");
 
while($mostrar = mysqli_fetch_array($querybuscar))
{
	$tickid 	= $mostrar['id_ticket'];
    $tickdesc 	= $mostrar['descripcion'];
	$tickdate 	= $mostrar['fecha_generado'];
    $tickstatus = $mostrar['estado'];
    $tickasig   = $mostrar['asignado'];

}
?>
<html>
<head>    
		<title>Tickets</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="caja_popup2">
  <form class="contenedor_popup" method="POST">
        <table>
		<tr><th colspan="2">Modificar ticket</th></tr>
            <tr> 
                <td>Descripción</td>
                <td><input type="text" name="txtdesc" value="<?php echo $tickdesc;?>" readonly></td>
            <tr> 
                <td>Fecha</td>
                <td><input type="date" name="txtdate" value="<?php echo $tickdate;?>" readonly></td>
            </tr>
			  <tr> 
                <td>Asignado</td>
                <td><input type="text" name="txtasig" value="<?php echo $tickasig;?>" readonly></td>
            </tr>
			  <tr> 
                <td>Estado</td>
                <td><input type="checkbox" name="txtstatus" value="<?php echo $tickstatus;?>"></td>
            </tr>
            <tr>
				
                <td colspan="2">
				 <?php echo "<a href=\"tickets.php?pag=$pagina\">Cancelar</a>";?>
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
	$desc1 = $_POST['txtdesc'];
	$date1 = $_POST['txtdate'];
	$asig1 = $_POST['txtasig'];
	$status1 = $_POST['txtstatus'];
      
    $querymodificar = mysqli_query($conn, "UPDATE ticket SET asignado='$asig1',descripcion='$desc1',fecha_generado='$date1',estado='$status1' WHERE id_ticket=$tickid");
	echo "<script>window.location= 'tickets.php?pag=$pagina' </script>";
    
}
?>
	