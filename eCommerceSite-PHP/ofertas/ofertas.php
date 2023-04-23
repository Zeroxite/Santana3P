<?php
include_once("conexion.php"); 

?>
<html>
<head>    
		<title>Clientes para ofertar</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    $codigo = $_GET['codigo'];
    $filasmax = 5;
 
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

        $sql = '';
        $mensaje = '';
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

 $sqlusu = mysqli_query($conn, "SELECT * FROM tbl_customer where cust_id  LIKE '%".$buscar."%' or cust_name LIKE '%".$buscar."%' or cust_email LIKE '%".$buscar."%' or cust_phone LIKE '%".$buscar."%'");

}
else
{
 $sqlusu = mysqli_query($conn, "SELECT * FROM tbl_customer ORDER BY cust_id ASC LIMIT " . (($pagina - 1) * $filasmax)  . "," . $filasmax);
}
 
    $resultadoMaximo = mysqli_query($conn, "SELECT count(*) as num_clientes FROM tbl_customer");
 
    $maxusutabla = mysqli_fetch_assoc($resultadoMaximo)['num_clientes'];
	
    ?>
	<div class="cont" >
	<form method="POST">
	<h1>Lista de clientes</h1>
	
	<a href="../admin/index.php">Inicio</a>
	
		<?php echo "<a href=\"agregar.php?pag=$pagina\">Crear cupon</a>";?>
			<input type="submit" value="Buscar" name="btnbuscar">
			<input type="text" name="txtbuscar"  placeholder="Buscar cliente" autocomplete="off" style='width:20%'>
            <input type="text" name="txtbuscarcupon"  placeholder="Cupon" autocomplete="off" style='width:12%' value="<?php echo $codigo;?>" readonly>
            <?php echo "<a href=\"seleccionar.php?pag=$pagina\">Elegir cupon</a>";?>
			</form>
    <table>
			<tr>
			<th>Id</th>
			<th>Nombre</th>
            <th>Correo</th>
            <th>Telefono</th>
            <th>Estado</th>
			</tr>
 
        <?php
 
        while ($mostrar = mysqli_fetch_assoc($sqlusu)) 
		{
			
            echo "<tr>";
            echo "<td>".$mostrar['cust_id']."</td>";
			echo "<td>".$mostrar['cust_name']."</td>";
            echo "<td>".$mostrar['cust_email']."</td>";    
			echo "<td>".$mostrar['cust_phone']."</td>";   
            echo "<td>".$mostrar['cust_status']."</td>";  
            echo "<td style='width:24%'>
			<input type='submit' value='Enviar oferta' name='btnAlert'>
            <a href=\"ver.php?id=$mostrar[cust_id]&pag=$pagina\">Ver</a>  
			</td>";  
			
        }
 
        ?>
    </table>
	<div style='text-align:right'>
	<br>
	<?php echo "Total de clientes: ".$maxusutabla;?>
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
            <a href="ofertas.php?pag=<?php echo $_GET['pag'] + 1; ?>">Siguiente</a>
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
            <a href="ofertas.php?pag=2">Siguiente</a>
        <?php
        }
 
        ?>
    </div>

    </form>
</div>
</body>
</html>

