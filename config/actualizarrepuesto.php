<?php

include_once('conecxion_bd.php');

// Validar que los datos fueron enviados correctamente
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener y sanitizar los datos del formulario
    $id = $_POST['id'];
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $costo = $_POST['costo'];
    $cantidad = $_POST['cantidad'];
    $estado = $_POST['estado'];
    $fecha_solicitud = $_POST['fecha_solicitud'];
    $fecha_recepcion = $_POST['fecha_recepcion'];

    // Verificar que no haya campos vacíos
   
        // Insertar datos en la base de datos
$sql = "UPDATE
                    repuesto SET
                    id_repuesto = '".$codigo."', 
                    nombre = '".$nombre."',
                    estado = '".$estado."',
                    costo = '".$costo."',
                    fecha_solicitud = '".$fecha_solicitud."',
                    fecha_recepcion = '".$fecha_recepcion."',
                    cantidad ='".$cantidad."'
                    WHERE id_repuesto = '".$id." ' ";

        if ($conexion->query($sql) === TRUE) {
             echo "<script type='text/javascript'>";
            echo "alert('Repuesto editado con exito');";
            echo "window.location.href = '../repuestos.php';";
            echo "</script>";
        } else {
            echo "Error al registrar el componente: " . $conn->error;
        }
    
} else {
    echo "Método de solicitud no válido.";
}

// Cerrar conexión
$conn->close();
?>