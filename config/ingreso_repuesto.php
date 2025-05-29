<?php

include_once('conecxion_bd.php');

// Validar que los datos fueron enviados correctamente
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener y sanitizar los datos del formulario
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $costo = $_POST['costo'];
    $cantidad = $_POST['cantidad'];
    $estado = $_POST['estado'];
    $fecha_solicitud = $_POST['fecha_solicitud'];
    $fecha_recepcion = $_POST['fecha_recepcion'];

    // Verificar que no haya campos vacíos
   
        // Insertar datos en la base de datos
        $sql = "INSERT INTO repuesto (id_repuesto, nombre, estado, costo, fecha_solicitud, fecha_recepcion, cantidad) 
                VALUES ('$codigo', '$nombre', '$estado', '$costo', '$fecha_solicitud' ,'$fecha_recepcion', '$cantidad')";

        if ($conexion->query($sql) === TRUE) {
            header("Location:../repuesto.php");
        } else {
            echo "Error al registrar el componente: " . $conn->error;
        }
    
} else {
    echo "Método de solicitud no válido.";
}

// Cerrar conexión
$conn->close();
?>