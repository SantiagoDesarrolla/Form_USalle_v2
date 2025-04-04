<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "form_usalle";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$nombre = $conn->real_escape_string($_POST['nombre']);
$apellido = $conn->real_escape_string($_POST['apellido']);
$documento = $conn->real_escape_string($_POST['documento']);
$telefono = $conn->real_escape_string($_POST['telefono']);
$email = $conn->real_escape_string($_POST['email']);
$mensaje = $conn->real_escape_string($_POST['mensaje']);

$sql = "INSERT INTO contacto (nombre, apellido, documento, telefono, email, mensaje) 
        VALUES ('$nombre', '$apellido', '$documento', '$telefono', '$email', '$mensaje')";

if ($conn->query($sql) === TRUE) {
    header("Location: ../gracias.html");
    exit();
} else {
    echo "Error al enviar el mensaje: " . $conn->error;
}
$conn->close();
?>
