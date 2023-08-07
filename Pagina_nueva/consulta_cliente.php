<?php
include('conexion_bd.php');


$consulta = " SELECT cliente.nombre, cliente.apellido, servicio.servicio, horario.horario, horario.fecha
FROM citas_clientes
INNER JOIN cliente
ON cliente.id_cliente = citas_clientes.cliente_nombre
INNER JOIN servicio
ON servicio.id_servicio = citas_clientes.servicio_elegido
INNER JOIN horario
ON horario.id = citas_clientes.horario_elegido
WHERE horario.fecha BETWEEN'2023-08-01' AND '2023-08-31'";


?>

<head>
<link rel="stylesheet" type="text/css" href="consulta_datos.css" />
</head>
<html>

<body>
        
        <div class="conteiner-table">
                <div class="titulo">TURNOS // CLIENTES</div>
                <div class="table__header">NOMBRE</div>
                <div class="table__header">APELLIDO</div>
                <div class="table__header">SERVICIO</div>
                <div class="table__header">HORA</div>
                <div class="table__header">FECHA</div>
                
                <?php $resultado = mysqli_query($conexion, $consulta);
                
                while($row=mysqli_fetch_assoc($resultado)) { ?>
                
                <input type="text" class="table__header" value="<?php echo $row["nombre"]; ?>" name="nombre">
                <input type="text" class="table__header" value="<?php echo $row["apellido"]; ?>" name="apellido">
                <input type="text" class="table__header" value="<?php echo $row["servicio"]; ?>" name="servicio">
                <input type="text" class="table__header" value="<?php echo $row["horario"]; ?>" name="horario">
                <input type="text" class="table__header" value="<?php echo $row["fecha"]; ?>" name="fecha">
                
                
                <?php } mysqli_free_result($resultado); ?>

        </div>


</body>
</html>