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
<div class="caja_popup2">
<td><input type="submit" value="Generar" id="generate"></td>
  <form class="contenedor_popup" method="POST">
        <table>
		<tr><th colspan="2" >Agregar Cupon</th><th>Acción</th></tr>
            <tr> 
                <td>CUPON</td>
                <td><input type="text" name="txtcoupon" id="coupon" readonly></td>
                
            </tr>
            <tr> 
                <td>Descuento</td>
                <td><input type="number" name="txtdiscount" autocomplete="off"></td>
                <td></td>
            </tr>
            
			  <tr> 
                <td>Fecha de vencimiento</td>
                <td><input type="date" name="txtdate" autocomplete="off"></td>
                <td></td>
            </tr>
            <tr> 	
               <td colspan="3" >
				  <?php echo "<a href=\"ofertas.php?pag=$pagina\">Cancelar</a>";?>
				   <input type="submit" name="btnregistrar" value="Registrar" onClick="javascript: return confirm('¿Deseas registrar este cupon?');">
                   
			</td>
            </tr>
        </table>
    </form>
 </div>
 <script type="text/javascript">
	$(document).ready(function(){
		$('#generate').on('click', function(){
			$.get("get_coupon.php", function(data){
				$('#coupon').val(data);
			});
		});
	});
</script>
</body>
</html>
<?php

		if(isset($_POST['btnregistrar']))
{   
	$vaicoupon 	= $_POST['txtcoupon'];
    $vaidiscount 	= $_POST['txtdiscount'];
	$vaidate 	= $_POST['txtdate'];

	$queryadd	= mysqli_query($conn, "INSERT INTO tbl_coupon(coupon_code,discount,date_ends,status) VALUES('$vaicoupon','$vaidiscount','$vaidate',1)");
	
 	if(!$queryadd)
	{
		// echo "Error con el registro: ".mysqli_error($conn);
		 echo "<script>alert('Cupon duplicado, intenta otra vez');</script>";
		 
	}else
	{
		echo "<script>window.location= 'ofertas.php?pag=1' </script>";
	}
}

function coupon($l){
    $coupon = "PR".substr(str_shuffle(str_repeat('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ',$l-2)),0,$l-2);

    return $coupon;
}

?>


