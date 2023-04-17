<?php
include_once("conexion.php"); 

?>
<html>
<head>    
		<title>Proveedores</title>
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

 $sqlusu = mysqli_query($conn, "SELECT * FROM proveedores where id = '".$buscar."'");

}
else
{
 $sqlusu = mysqli_query($conn, "SELECT * FROM proveedores ORDER BY nom ASC LIMIT " . (($pagina - 1) * $filasmax)  . "," . $filasmax);
}
 
    $resultadoMaximo = mysqli_query($conn, "SELECT count(*) as num_proveedores FROM proveedores");
 
    $maxusutabla = mysqli_fetch_assoc($resultadoMaximo)['num_proveedores'];
	
    ?>
	<div class="cont" >
	<form method="POST">
	<h1>Lista de proveedores</h1>
	
	<a href="../admin/index.php">Inicio</a>
	
		<?php echo "<a href=\"agregar.php?pag=$pagina\">Crear proveedor</a>";?>
			<input type="submit" value="Buscar" name="btnbuscar">
			<input type="text" name="txtbuscar"  placeholder="Ingresar ID de proveedor" autocomplete="off" style='width:20%'>
			</form>
    <table>
			<tr>
			<th>Nombre</th>
			<th>ID</th>
            <th>Dirección</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Precio</th>
            <th>Producto</th>
			<th>Acción</th>
			</tr>
 
        <?php
 
        while ($mostrar = mysqli_fetch_assoc($sqlusu)) 
		{
			
            echo "<tr>";
            echo "<td>".$mostrar['nom']."</td>";
			echo "<td>".$mostrar['id']."</td>";
            echo "<td>".$mostrar['dir']."</td>";    
			echo "<td>".$mostrar['tel']."</td>";  
			echo "<td>".$mostrar['email']."</td>";  
            echo "<td>".$mostrar['precio']."</td>";  
			echo "<td>".$mostrar['producto']."</td>"; 
            echo "<td style='width:24%'>
			<a href=\"ver.php?id=$mostrar[id]&pag=$pagina\">Ver</a> 
			<a href=\"editar.php?id=$mostrar[id]&pag=$pagina\">Modificar</a> 
			<a href=\"eliminar.php?id=$mostrar[id]&pag=$pagina\" onClick=\"return confirm('¿Estás seguro de eliminar a $mostrar[nom]?')\">Eliminar</a>
			</td>";  
			
        }
 
        ?>
    </table>
	<div style='text-align:right'>
	<br>
	<?php echo "Total de proveedores: ".$maxusutabla;?>
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
					<a href="proveedores.php?pag=<?php echo $_GET['pag'] - 1; ?>">Anterior</a>
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
            <a href="proveedores.php?pag=<?php echo $_GET['pag'] + 1; ?>">Siguiente</a>
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
            <a href="proveedores.php?pag=2">Siguiente</a>
        <?php
        }
 
        ?>
    </div>

    </form>
</div>
</body>
</html>

