<?php

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "estetica";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener los datos del formulario
$comentario = $_POST['comentario'];

// Insertar datos en la primera tabla
$sql1 = "INSERT INTO comentario(comentario) VALUES ('$comentario')";
if ($conn->query($sql1) === TRUE) {
    echo "Datos insertados correctamente en la tabla Comentario.";
} else {
    echo "Error al insertar datos en la tabla 1: " . $conn->error;
}