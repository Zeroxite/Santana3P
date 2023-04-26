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

// Cerrar la conexión a la base de datos
mysqli_close($conexion);


?>
</body>





</html>

