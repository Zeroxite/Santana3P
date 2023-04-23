<?php 
include_once("conexion.php");
include_once("ofertas.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

$pagina = $_GET['pag'];
$custid = $_GET['id'];

$querybuscar = mysqli_query($conn, "SELECT * FROM tbl_customer WHERE cust_id=$custid");
 
while($mostrar = mysqli_fetch_array($querybuscar))
{
	$custnom 	= $mostrar['cust_name'];
	$custid 	= $mostrar['cust_id'];
    $custcorreo 	= $mostrar['cust_email'];
	$custtel 	= $mostrar['cust_phone'];
}
$email_user = 'phpecommerce3p@gmail.com';
     
        $email_password = 'jkcddakuphtiqhcx';

        $sql = 'SELECT p.p_name as Producto,p.p_current_price as Precio, COUNT(*) AS Ventas_Realizadas
        FROM tbl_product p
        JOIN tbl_order o ON p.p_id = o.product_id
        GROUP BY p.p_id
        HAVING Ventas_Realizadas <= 10;';
        $mensaje = '';
        $query = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($query)){
                
                $mensaje .= json_encode($row["Producto"]).'<br>';
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
                $correo = $custcorreo;
                
                $mail->addAddress($correo);     //Add a recipient
              
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'DESCUENTO';
                $mail->Body    = 'La empresa GamingForever le ofrece los siguientes productos: <br>'.$mensaje.'<br> Utilice el siguiente codigo de descuento para comprar uno de estos productos: XASAFDAQWVQ';
                
                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
?>



	