<?php
include_once("conexion.php"); 
?>
<html>
<head>    
		<title>Points</title>
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

 $sqlusu = mysqli_query($conn, "SELECT * FROM tbl_points where id_points = '".$buscar."'");

}
else
{
 $sqlusu = mysqli_query($conn, "SELECT * FROM tbl_points ORDER BY points ASC LIMIT " . (($pagina - 1) * $filasmax)  . "," . $filasmax);
}
 
    $resultadoMaximo = mysqli_query($conn, "SELECT count(*) as num_gama FROM tbl_points");
 
    $maxusutabla = mysqli_fetch_assoc($resultadoMaximo)['num_gama'];
	
    ?>
	<div class="cont" >
	<form method="POST">
	<h1>Lista de parametros</h1>
	
	<a href="../admin/index.php">Inicio</a>
	
		<?php echo "<a href=\"points-add.php?pag=$pagina\">Añadir parámetro de puntos</a>";?>
			<input type="submit" value="Buscar" name="btnbuscar">
			<input type="text" name="txtbuscar"  placeholder="Ingresar parámetro" autocomplete="off" style='width:20%'>
			</form>
    <table>
			<tr>
			<th>ID</th>
            <th>Nombre</th>
            <th>Parameters</th>
            <th>Puntos</th>
			<th>Acción</th>
			</tr>
 
        <?php
 
        while ($mostrar = mysqli_fetch_assoc($sqlusu)) 
		{
			
            echo "<tr>";
			echo "<td>".$mostrar['id_points']."</td>";
            echo "<td>".$mostrar['name_points']."</td>";
            echo "<td>".$mostrar['parameters']."</td>";  
            echo "<td>".$mostrar['points']."</td>";  
            echo "<td style='width:24%'>
			<a href=\"editar_points.php?id=$mostrar[id_points]&pag=$pagina\">Modificar</a> 
			<a href=\"eliminar_points.php?id=$mostrar[id_points]&pag=$pagina\" onClick=\"return confirm('¿Estás seguro de eliminar a $mostrar[name_points]?')\">Eliminar</a>
			</td>";  
			
        }
 
        ?>
    </table>
	<div style='text-align:right'>
	<br>
	<?php echo "Total de parámetros: ".$maxusutabla;?>
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
					<a href="points.php?pag=<?php echo $_GET['pag'] - 1; ?>">Anterior</a>
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
            <a href="points.php?pag=<?php echo $_GET['pag'] + 1; ?>">Siguiente</a>
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
            <a href="points.php?pag=2">Siguiente</a>
        <?php
        }
 
        ?>
    </div>

    </form>
</div>
</body>
</html>

