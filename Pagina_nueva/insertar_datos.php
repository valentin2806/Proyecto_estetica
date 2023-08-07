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
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$servicio = $_POST['servicio'];
$horario = $_POST['horario'];
$fecha = $_POST['fecha'];

//Funcion para consultar si hay turno disponible

function isTurnoDisponibleEnBD($conn, $horario, $fecha) {
    $sql = "SELECT * FROM horario WHERE horario = '$horario' AND fecha = '$fecha'";
    $result = $conn->query($sql);
    return $result->num_rows === 0;
}
if (isTurnoDisponibleEnBD($conn, $horario, $fecha)) {
    // Si el turno está disponible, lo agregamos a la tabla 'citas_clientes'
    //$sql = "INSERT INTO citas_clientes(cliente_nombre, horario_elegido, servicio_elegido) VALUES ('$cliente_id', '$horario_id', '$servicio_id')";
   
// Insertar datos en la tabla clientes

    $sql1 = "INSERT INTO cliente(nombre, apellido, correo, telefono) VALUES ('$nombre', '$apellido', '$correo', '$telefono')";
    if ($conn->query($sql1) === TRUE) {
        echo "Datos insertados correctamente en tabla clientes.";
    } else {
        echo "Error al insertar datos en la tabla 1: " . $conn->error;
    }
    $cliente_id = $conn->insert_id;

// Insertar datos en la tabla horarios

    $sql2 = "INSERT INTO horario(horario, fecha) VALUES ('$horario', '$fecha')";
    if ($conn->query($sql2) === TRUE) {
        echo "Datos insertados correctamente en la tabla Horario.";
    } else {
        echo "Error al insertar datos en la tabla 2: " . $conn->error;
    }
    $horario_id = $conn->insert_id;

// Insertar datos en la tabla servicios

    $sql3 = "INSERT INTO servicio(servicio) VALUES ('$servicio')";
    if ($conn->query($sql3) === TRUE) {
        echo "Datos insertados correctamente en la tabla servicio.";
    } else {
        echo "Error al insertar datos en la tabla 2: " . $conn->error;
    }
    $servicio_id = $conn->insert_id;


// Insertar datos en tabla citas_clientes

    $sql_citas_clientes = "INSERT INTO citas_clientes(cliente_nombre, horario_elegido, servicio_elegido) VALUES ('$cliente_id', '$horario_id', '$servicio_id')";
    if ($conn->query($sql_citas_clientes) === false) {
        echo "Error al insertar en la tabla 'citas-clientes': " . $conn->error;
    }

}else {
    echo "<h2>Error</h2>";
    echo "<p>El turno para el horario $horario y la fecha $fecha ya está ocupado.</p>";
    echo "<p>¡Por favor elegir otro horario y otra fecha!</p>";
    
}



// Cerrar la conexión
$conn->close();
?>










