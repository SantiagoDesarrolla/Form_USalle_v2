<?php
$servername = "localhost";
$username = "formContactoSalle";
$password = "contPHP2000";
$dbname = "form_usalle";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if (
    isset($_POST['nombre']) &&
    isset($_POST['apellido']) &&
    isset($_POST['documento']) &&
    isset($_POST['telefono']) &&
    isset($_POST['email']) &&
    isset($_POST['mensaje'])
) {
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $apellido = $conn->real_escape_string($_POST['apellido']);
    $documento = $conn->real_escape_string($_POST['documento']);
    $telefono = $conn->real_escape_string($_POST['telefono']);
    $email = $conn->real_escape_string($_POST['email']);
    $mensaje = $conn->real_escape_string($_POST['mensaje']);

    $sql = "INSERT INTO mensajes (nombre, apellido, documento, telefono, email, mensaje) 
            VALUES ('$nombre', '$apellido', '$documento', '$telefono', '$email', '$mensaje')";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../gracias.html");
        exit();
    } else {
        echo "Error al enviar el mensaje: " . $conn->error;
    }
} else {
    echo "Faltan datos del formulario.";
}

$conn->close();
?>
