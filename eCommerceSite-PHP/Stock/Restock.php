<?php
include_once("conexion.php");
//include "PHPMailer.php";
//include "SMTP.php";
//include "POP3.php";
//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';
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
    $pass = 'xhqaskxqfffemxsc';
    $proveedorRecomendado = mysqli_query($conn,"select email from proveedores ORDER BY precio ASC LIMIT 1;");
    
    if (isset($_GET['pag'])) 
	{
        $pagina = $_GET['pag'];
    } else 
	{
        $pagina = 1;
    }

    if(isset($_POST['btnAlert'])){
        
        
        
        $email_user = 'phpecommerce3p@gmail.com';
     
        $email_password = 'jkcddakuphtiqhcx';
        $sql = "select p.p_id as ID,p.p_name as Producto,p.p_current_price as Precio,p.p_qty as Cantidad from tbl_product p INNER JOIN tbl_product_vs_stocklimit tps on p.p_id = tps.id_product INNER JOIN tbl_stockrange tsr ON tsr.Id_range = tps.Id_range_stock";
        $mensaje = '';
        //Server settings
            $query = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($query)){
                
                $mensaje .= json_encode($row).'<br>';
            }
       
        $mail = new PHPMailer(true);

        try {
            
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();
            $mail->SMTPOptions = array(
                'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
                )
                );                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = $email_user;                     //SMTP username
            $mail->Password   = $email_password;                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $mail->setFrom($email_user, 'GamingForever');
            $correo = '';
            while($row = mysqli_fetch_assoc($proveedorRecomendado)){
                
                $correo .= $row['email'];
                echo $correo;
            }
            $mail->addAddress($correo);     //Add a recipient
          
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Comprar productos para reabastecer';
            $mail->Body    = 'La empresa GamingForever necesita reabastecer los siguientes productos: <br>'.$mensaje.'<br> Favor de ponerse encontacto con nosotros';
            
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

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
            <input type="submit" value="Notificar proveedor" name="btnAlert">
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

