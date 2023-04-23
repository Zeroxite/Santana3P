<?php 
include_once("conexion.php"); 
include_once("ofertas.php");

$pagina = $_GET['pag'];
?>
<html>
<head>    
		<title>Cupones</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style.css">
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
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
	$sqlusu = mysqli_query($conn, "SELECT * FROM tbl_coupon");

	if(isset($_POST['btnSelect'])){
		

	}

	?>
<div class="caja_popup2">
  <form class="contenedor_popup" action="ofertas.php" method="POST">
  <table>
			<tr>
			<th>Id</th>
			<th>Codigo</th>
            <th>Descuento</th>
            <th>Fecha de expiracion</th>
            <th>Estado</th>
			</tr>
 
        <?php
 
        while ($mostrar = mysqli_fetch_assoc($sqlusu)) 
		{
			
            echo "<tr>";
            echo "<td>".$mostrar['id_coupon']."</td>";
			echo "<td>".$mostrar['coupon_code']."</td>";
            echo "<td>".$mostrar['discount']."</td>";    
			echo "<td>".$mostrar['date_ends']."</td>";   
            echo "<td>".$mostrar['status']."</td>";  
            echo "<td style='width:24%'>
			<a href=\"ofertas.php?codigo=$mostrar[coupon_code]\">Seleccionar</a>  
			</td>";  
			
        }
 
        ?>
    </table>
	<div style="text-align:center">
        <?php
        if (isset($_GET['pag'])) {
		   if ($_GET['pag'] > 1) {
                ?>
					<a href="ofertas.php?pag=<?php echo $_GET['pag'] - 1; ?>">Anterior</a>
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
            <a href="seleccionar.php?pag=<?php echo $_GET['pag'] + 1; ?>">Siguiente</a>
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
            <a href="seleccionar.php?pag=2">Siguiente</a>
        <?php
        }
 
        ?>
    </div>
    </form>
 </div>
</body>
</html>



