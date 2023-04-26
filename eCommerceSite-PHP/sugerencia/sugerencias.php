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
$option = "disabled";

$combo1 = $_POST['comboutil'];
echo $combo1;

$presupuesto = $_POST['txtbudget'];
$sqlusu = mysqli_query($conn, "SELECT p.p_id,p.p_name,g.nombre,p.p_current_price FROM `tbl_gama_vs_product` vs inner join tbl_product p on vs.id_product = p.p_id INNER JOIN tbl_gama g on g.id_categoria = vs.id_categoria WHERE g.nombre = '".$combo1."' AND p.p_current_price<='".$presupuesto."';");

}else{
$sqlusu = mysqli_query($conn, "SELECT p.p_id,p.p_name,g.nombre,p.p_current_price FROM `tbl_gama_vs_product` vs inner join tbl_product p on vs.id_product = p.p_id INNER JOIN tbl_gama g on g.id_categoria = vs.id_categoria;");
}

 $resultadoMaximo = mysqli_query($conn, "SELECT count(*) as num_ofertas FROM `tbl_gama_vs_product`");

 $maxusutabla = mysqli_fetch_assoc($resultadoMaximo)['num_ofertas'];
 
 ?>
	<div class="cont" >
	<form method="POST">
	<h1>Sugerencias</h1>
	
	<a href="../index.php">Inicio</a>
        <br>
            Nombre del cliente:
			<input type="text" name="txtbuscar"  placeholder="" autocomplete="off" style='width:15%'>
            Uso:
            <select name="comboutil" onChange="combo(this, 'demo')" style='width:20%'>
            <option selected="true" disabled="disabled">Seleccionar...</option>
            <option value ="Gama alta">Gaming</option>
            <option value ="Gama baja">Word/Excel.(Uso estudiantil)</option>
            <option value ="Gama media">Editar videos/fotos</option>
            <option value ="Gama alta">Programar/Diseñar</option>
            <option value ="Gama baja">Ver videos y películas</option>
            <option value ="Gama media">Transmitir en Twitch y Youtube</option>
            <option value ="Gama media">Otros</option>
            </select>
            Presupuesto:
            <input type="number" name="txtbudget"  placeholder="" autocomplete="off" style='width:10%'>          
            <input type="submit" value="Buscar" name="btnbuscar">
            
    <table>
			<tr>
			<th>ID</th>
            <th>Nombre</th>
            <th>Gama</th>
            <th>Precio</th>
			</tr>
       
        <?php
 
        while ($mostrar = mysqli_fetch_assoc($sqlusu)) 
		{
			
            echo "<tr>";
			echo "<td>".$mostrar['p_id']."</td>";
            echo "<td>".$mostrar['p_name']."</td>";    
			echo "<td>".$mostrar['nombre']."</td>";  
			echo "<td>".$mostrar['p_current_price']."</td>";   
            echo "<td style='width:24%'>
            <a href=\"../product.php?id=$mostrar[p_id]\">Ver</a>
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
					<a href="sugerencias.php?pag=<?php echo $_GET['pag'] - 1; ?>">Anterior</a>
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
            <a href="sugerencias.php?pag=<?php echo $_GET['pag'] + 1; ?>">Siguiente</a>
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
            <a href="sugerencias.php?pag=2">Siguiente</a>
        <?php
        }
 
        ?>
    </div>

</form>
	</div>
</body>
</html>

