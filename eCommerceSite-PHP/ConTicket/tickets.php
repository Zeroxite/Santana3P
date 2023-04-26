<?php
include_once("conexion.php"); 

?>
<html>
<head>    
		<title>Tickets</title>
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

 $sqlusu = mysqli_query($conn, "SELECT * FROM ticket where id_ticket = '".$buscar."'");

}
else
{
 $sqlusu = mysqli_query($conn, "SELECT * FROM ticket ORDER BY id_ticket ASC LIMIT " . (($pagina - 1) * $filasmax)  . "," . $filasmax);
}
 
    $resultadoMaximo = mysqli_query($conn, "SELECT count(*) as num_tickets FROM ticket");
 
    $maxusutabla = mysqli_fetch_assoc($resultadoMaximo)['num_tickets'];
	
    ?>
	<div class="cont" >
	<form method="POST">
	<h1>Tickets</h1>
	
	<a href="../admin/index.php">Inicio</a>
	
			<input type="submit" value="Buscar" name="btnbuscar">
			<input type="text" name="txtbuscar"  placeholder="Ingresar ID de ticket" autocomplete="off" style='width:20%'>
			</form>
    <table>
			<tr>
			<th>ID</th>
            <th>Descripción</th>
            <th>Fecha</th>
            <th>Estado</th>
            <th>Asignado</th>
			<th>Acción</th>
			</tr>
 
        <?php
 
        while ($mostrar = mysqli_fetch_assoc($sqlusu)) 
		{
			
            echo "<tr>";
            echo "<td>".$mostrar['id_ticket']."</td>";
			echo "<td>".$mostrar['descripcion']."</td>";
            echo "<td>".$mostrar['fecha_generado']."</td>";    
			echo "<td>".$mostrar['estado']."</td>";  
			echo "<td>".$mostrar['asignado']."</td>";  
            echo "<td style='width:24%'>
			<a href=\"editar.php?id=$mostrar[id_ticket]&pag=$pagina\">Modificar</a> 
			<a href=\"eliminar.php?id=$mostrar[id_ticket]&pag=$pagina\" onClick=\"return confirm('¿Estás seguro de eliminar a $mostrar[asignado]?')\">Eliminar</a>
			</td>";  
			
        }
 
        ?>
    </table>
	<div style='text-align:right'>
	<br>
	<?php echo "Total de tickets: ".$maxusutabla;?>
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
					<a href="tickets.php?pag=<?php echo $_GET['pag'] - 1; ?>">Anterior</a>
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
            <a href="tickets.php?pag=<?php echo $_GET['pag'] + 1; ?>">Siguiente</a>
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
            <a href="tickets.php?pag=2">Siguiente</a>
        <?php
        }
 
        ?>
    </div>

    </form>
</div>
</body>
</html>

