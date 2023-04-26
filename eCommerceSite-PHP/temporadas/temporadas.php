<?php
include_once("conexion.php"); 

?>
<html>
<head>    
		<title>Ofertas de temporada</title>
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

 $sqlusu = mysqli_query($conn, "SELECT * FROM tbl_season_offers where id_sf = '".$buscar."'");

}
else
{
 $sqlusu = mysqli_query($conn, "SELECT * FROM tbl_season_offers ORDER BY date_end ASC LIMIT " . (($pagina - 1) * $filasmax)  . "," . $filasmax);
}
 
    $resultadoMaximo = mysqli_query($conn, "SELECT count(*) as num_ofertas FROM tbl_season_offers");
 
    $maxusutabla = mysqli_fetch_assoc($resultadoMaximo)['num_ofertas'];
	
    ?>
	<div class="cont" >
	<form method="POST">
	<h1>Lista de ofertas por temporada</h1>
	
	<a href="../admin/index.php">Inicio</a>
	
		<?php echo "<a href=\"agregar.php?pag=$pagina\">Crear oferta</a>";?>
			<input type="submit" value="Buscar" name="btnbuscar">
			<input type="text" name="txtbuscar"  placeholder="Ingresar ID de oferta" autocomplete="off" style='width:20%'>
			</form>
    <table>
			<tr>
			<th>ID</th>
            <th>Descripción</th>
            <th>Fecha de inicio</th>
            <th>Fecha de cierre</th>
            <th>Descuento</th>
            <th>Categoria</th>
			<th>Acción</th>
			</tr>
 
        <?php
 
        while ($mostrar = mysqli_fetch_assoc($sqlusu)) 
		{
			
            echo "<tr>";
			echo "<td>".$mostrar['id_sf']."</td>";
            echo "<td>".$mostrar['description']."</td>";    
			echo "<td>".$mostrar['date_start']."</td>";  
			echo "<td>".$mostrar['date_end']."</td>";  
            echo "<td>".$mostrar['discounts']."</td>";
            echo "<td>".$mostrar['categoria']."</td>";   
            echo "<td style='width:24%'>
			<a href=\"ver.php?id=$mostrar[id_sf]&pag=$pagina\">Ver</a> 
			<a href=\"editar.php?id=$mostrar[id_sf]&pag=$pagina\">Modificar</a> 
			<a href=\"eliminar.php?id=$mostrar[id_sf]&pag=$pagina\" onClick=\"return confirm('¿Estás seguro de eliminar a $mostrar[description]?')\">Eliminar</a>
			</td>";  
			
        }
 
        ?>
    </table>
	<div style='text-align:right'>
	<br>
	<?php echo "Total de ofertas por temporada: ".$maxusutabla;?>
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
					<a href="temporadas.php?pag=<?php echo $_GET['pag'] - 1; ?>">Anterior</a>
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
            <a href="temporadas.php?pag=<?php echo $_GET['pag'] + 1; ?>">Siguiente</a>
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
            <a href="temporadas.php?pag=2">Siguiente</a>
        <?php
        }
 
        ?>
    </div>

    </form>
</div>
</body>
</html>

