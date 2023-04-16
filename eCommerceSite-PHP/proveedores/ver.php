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
    $provprod   = $mostrar['producto'];
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
		<tr><th colspan="2">Ver proveedor</th></tr>
            <tr> 
                <td>Nombre: </td>
                <td><?php echo $provnom;?></td>
            </tr>
			   <tr> 
                <td>ID: </td>
                <td><?php echo $provid;?></td>
            </tr>
        
            <tr> 
                <td>Dirección: </td>
                <td><?php echo $provdir;?></td>
            </tr>
			  <tr> 
                <td>Telefono: </td>
                <td><?php echo $provtel;?></td>
            </tr>
			  <tr> 
                <td>Correo: </td>
                <td><?php echo $provcorreo;?></td>
            </tr>
            <tr> 
                <td>Precio: </td>
                <td><?php echo $provprecio;?></td>
            </tr>
			  <tr> 
                <td>Producto: </td>
                <td><?php echo $provprod;?></td>
            </tr>
            <tr>
				
                <td colspan="2">
				 <?php echo "<a href=\"proveedores.php?pag=$pagina\">Regresar</a>";?>
				</td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>


	