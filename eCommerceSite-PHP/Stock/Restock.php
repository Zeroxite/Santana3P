<?php
include_once("conexion.php"); 
//. (($pagina - 1) * $filasmax)  . "," . $filasmax
?>
<html>
<head>    
		<title>Reabastecimiento</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
 
    $filasmax = 5;
 
    if (isset($_GET['pag'])) 
	{
        $pagina = $_GET['pag'];
    } else 
	{
        $pagina = 1;
    }
 
 if(isset($_POST['btnbuscar']))
{
$buscar = $_POST['txtbuscar'];

 $sqlusu = mysqli_query($conn, "select p.p_id,p.p_name,p.p_current_price,p.p_qty,tsr.MinStock from tbl_product p INNER JOIN tbl_product_vs_stocklimit tps on p.p_id = tps.id_product INNER JOIN tbl_stockrange tsr ON tsr.Id_range = tps.Id_range_stock WHERE id_product = '".$buscar."'");

}
else
{
 $sqlusu = mysqli_query($conn, "select p.p_id,p.p_name,p.p_current_price,p.p_qty,tsr.MinStock from tbl_product p INNER JOIN tbl_product_vs_stocklimit tps on p.p_id = tps.id_product INNER JOIN tbl_stockrange tsr ON tsr.Id_range = tps.Id_range_stock");
}
 
    $resultadoMaximo = mysqli_query($conn, "SELECT count(*) as num_productos FROM tbl_product_vs_stocklimit");
 
    $maxusutabla = mysqli_fetch_assoc($resultadoMaximo)['num_productos'];
	
    ?>
	<div class="cont" >
	<form method="POST">
	<h1>Reabastecimiento</h1>
	
	<a href="../admin/index.php">Inicio</a>
	
			<input type="submit" value="Buscar" name="btnbuscar">
			<input type="text" name="txtbuscar"  placeholder="Ingresar ID de producto" autocomplete="off" style='width:20%'>
            <a href="Notificar.php?id=$mostrar[id]&pag=$pagina\">Notificar proveedor</a>
			</form>
    
    <table>
			<tr>
            <th>ID</th>
			<th>Nombre</th>
			<th>Precio</th>
            <th>Cantidad</th>
            <th>C. Minima</th>
			</tr>
 
        <?php
 
        while ($mostrar = mysqli_fetch_assoc($sqlusu)) 
		{
			
            echo "<tr>";
            echo "<td>".$mostrar['p_id']."</td>";
			echo "<td>".$mostrar['p_name']."</td>";
            echo "<td>".$mostrar['p_current_price']."</td>";    
			echo "<td>".$mostrar['p_qty']."</td>";  
			echo "<td>".$mostrar['MinStock']."</td>";  
            echo "<td style='width:24%'> 
			</td>";  
			
        }
 
        ?>
    </table>
	<div style='text-align:right'>
	<br>
	<?php echo "Total de productos: ".$maxusutabla;?>
	</div>
	</div>
<div style='text-align:right'>
<br>
</div>
    <div style="text-align:center">
        <?php
        if (isset($_GET['pag'])) {
		   if ($_GET['pag'] > 1) {
                ?>
					<a href="Restock.php?pag=<?php echo $_GET['pag'] - 1; ?>">Anterior</a>
            <?php
					} 
				else 
					{
                    ?>
					<a href="#" style="pointer-events: none">Anterior</a>
            <?php
					}
                ?>
 
        <?php
        } 
		else 
		{
            ?>
            <a href="#" style="pointer-events: none">Anterior</a>
            <?php
        }
 
        if (isset($_GET['pag'])) {
            if ((($pagina) * $filasmax) < $maxusutabla) {
                ?>
            <a href="Restock.php?pag=<?php echo $_GET['pag'] + 1; ?>">Siguiente</a>
        <?php
            } else {
                ?>
            <a href="#" style="pointer-events: none">Siguiente</a>
        <?php
            }
            ?>
        <?php
        } else {
            ?>
            <a href="Restock.php?pag=2">Siguiente</a>
        <?php
        }
 
        ?>
    </div>

    </form>
</div>
</body>
</html>

