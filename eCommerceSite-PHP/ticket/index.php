<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>
<form action="#" method="POST" class="contact-form">
  <h2>Crear ticket</h2>
  
  <label for="email">Email:</label>
  <input type="email" id="email" name="email" placeholder="Escribe tu email" required>
  
  
  <label for="message">Mensaje:</label>
  <textarea id="message" name="message" placeholder="Escribe tu mensaje" required></textarea>
  
  <button type="submit" class="submit-button">Enviar mensaje</button>
</form>
<?php
// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "ecommerceweb");

// Verificar la conexión
if (!$conexion) {
    die("Error al conectarse a la base de datos: " . mysqli_connect_error());
}

// Obtener los datos a insertar desde un formulario o cualquier otra fuente

$correo = $_POST["email"];
$mensaje = $_POST["message"];


// Crear la consulta SQL para insertar los datos en la tabla
$sql = "INSERT INTO ticket (asignado, descripcion, fecha_generado,estado) VALUES ('$correo', '$mensaje', CURRENT_DATE(),1)";

// Ejecutar la consulta y verificar si se insertaron los datos correctamente
if (mysqli_query($conexion, $sql)) {
    echo "Datos insertados correctamente";
} else {
    echo "Error al insertar los datos: " . mysqli_error($conexion);
	
}
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';
$email_user = 'phpecommerce3p@gmail.com';
     
        $email_password = 'jkcddakuphtiqhcx';
        $sql = '';
        $mensaje = '';
        
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
                
                
                $mail->addAddress($correo);     //Add a recipient
              
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'TICKET';
                $mail->Body    = 'Su ticket ha sido creado';
                
                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }

// Cerrar la conexión a la base de datos
mysqli_close($conexion);


?>
</body>





</html>

