<?php

$host = "localhost";
$usuario = "formContactoSalle";  
$password = "contPHP2000";  
$base_datos = "form_usalle";

$conexion = new mysqli($host, $usuario, $password, $base_datos);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>
