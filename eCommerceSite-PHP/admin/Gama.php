<?php
include_once("conexion.php"); 
?>
<html>
<head>    
		<title>Gama</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="styles.css">
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

 $sqlusu = mysqli_query($conn, "SELECT * FROM tbl_gama where id_categoria = '".$buscar."'");

}
else
{
 $sqlusu = mysqli_query($conn, "SELECT * FROM tbl_gama ORDER BY min_range ASC LIMIT " . (($pagina - 1) * $filasmax)  . "," . $filasmax);
}
 
    $resultadoMaximo = mysqli_query($conn, "SELECT count(*) as num_gama FROM tbl_gama");
 
    $maxusutabla = mysqli_fetch_assoc($resultadoMaximo)['num_gama'];
	
    ?>
	<div class="cont" >
	<form method="POST">
	<h1>Lista de gamas</h1>
	
	<a href="../admin/index.php">Inicio</a>
	
		<?php echo "<a href=\"gama-add.php?pag=$pagina\">Añadir gama</a>";?>
			<input type="submit" value="Buscar" name="btnbuscar">
			<input type="text" name="txtbuscar"  placeholder="Ingresar ID de gama" autocomplete="off" style='width:20%'>
			</form>
    <table>
			<tr>
			<th>ID</th>
            <th>Nombre</th>
            <th>Puntos</th>
			<th>Acción</th>
			</tr>
 
        <?php
 
        while ($mostrar = mysqli_fetch_assoc($sqlusu)) 
		{
			
            echo "<tr>";
			echo "<td>".$mostrar['id_categoria']."</td>";
            echo "<td>".$mostrar['nombre']."</td>";
            echo "<td>".$mostrar['min_range']."</td>";    
            echo "<td style='width:24%'>
			<a href=\"editar.php?id=$mostrar[id_categoria]&pag=$pagina\">Modificar</a> 
			<a href=\"eliminar.php?id=$mostrar[id_categoria]&pag=$pagina\" onClick=\"return confirm('¿Estás seguro de eliminar a $mostrar[nombre]?')\">Eliminar</a>
			</td>";  
			
        }
 
        ?>
    </table>
	<div style='text-align:right'>
	<br>
	<?php echo "Total de gamas: ".$maxusutabla;?>
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
					<a href="Gama.php?pag=<?php echo $_GET['pag'] - 1; ?>">Anterior</a>
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
            <a href="Gama.php?pag=<?php echo $_GET['pag'] + 1; ?>">Siguiente</a>
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
            <a href="Gama.php?pag=2">Siguiente</a>
        <?php
        }
 
        ?>
    </div>

    </form>
</div>
</body>
</html>

