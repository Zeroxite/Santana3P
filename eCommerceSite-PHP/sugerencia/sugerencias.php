<?php
include_once("conexion.php"); 

?>
<html>
<head>    
		<title>Sugerencias</title>
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

//$sqlusu = mysqli_query($conn, "SELECT * FROM tbl_gama_vs_product where id_sf = '".$buscar."'");

}

 //$resultadoMaximo = mysqli_query($conn, "SELECT count(*) as num_ofertas FROM tbl_season_offers");

 //$maxusutabla = mysqli_fetch_assoc($resultadoMaximo)['num_ofertas'];
 
 ?>
	<div class="cont" >
	<form method="POST">
	<h1>Sugerencias</h1>
	
	<a href="../admin/index.php">Inicio</a>
        <br>
            Nombre del cliente:
			<input type="text" name="txtbuscar"  placeholder="" autocomplete="off" style='width:15%'>
            Uso:
            <select name="comboutil" onChange="combo(this, 'demo')" style='width:20%'>
            <option>Seleccionar...</option>
            <option>Gaming</option>
            <option>Word/Excel.(Uso estudiantil)</option>
            <option>Editar videos/fotos</option>
            <option>Programar/Diseñar</option>
            <option>Ver videos y películas</option>
            <option>Transmitir en Twitch y Youtube</option>
            <option>Otros</option>
            </select>
            Presupuesto:
            <input type="number" name="txtbuscar"  placeholder="" autocomplete="off" style='width:10%'>
            Gama:
            <select name="combogama" onChange="combo(this, 'demo')" style='width:15%'>
            <option>Seleccionar...</option>
            <option>Baja</option>
            <option>Media</option>
            <option>Alta</option>
            <input type="submit" value="Buscar" name="btnbuscar">
    <table>
			<tr>
			<th>ID</th>
            <th>Nombre</th>
            <th>Gama</th>
            <th>Precio</th>
			</tr>
        <!--
        <?php
 
        while ($mostrar = mysqli_fetch_assoc($sqlusu)) 
		{
			
            echo "<tr>";
			echo "<td>".$mostrar['id_product']."</td>";
            echo "<td>".$mostrar['p_name']."</td>";    
			echo "<td>".$mostrar['nombre']."</td>";  
			echo "<td>".$mostrar['p_current_price']."</td>";   
            echo "<td style='width:24%'>
			<a href=\"ver.php?id=$mostrar[p_id]&pag=$pagina\">Ver</a> 
			</td>";  
			
        }
 
        ?>
        -->
    </table>

</form>
	</div>
</body>
</html>

