<?php

include_once('conecxion_bd.php');

// Validar que los datos fueron enviados correctamente
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener y sanitizar los datos del formulario
    $codigo = $_POST['codigo'];
    $usuario = $_POST['usuario'];
    $fecha_reporte = $_POST['fecha_reporte'];
    $prioridad = $_POST['prioridad'];
    $estado = $_POST['estado'];
    $observacion = $_POST['observacion'];
    $fecha_solucion = $_POST['fecha_solucion'];

    // Verificar que no haya campos vacíos
   
        // Insertar datos en la base de datos
        $sql = "INSERT INTO incidencias (id_equipo, id_usuario, fecha_reporte, prioridad, estado_solucion, observacion, fecha_solucion) 
                VALUES ('$codigo', '$usuario', '$fecha_reporte', '$prioridad', '$estado' ,'$observacion', '$fecha_solucion')";

        if ($conexion->query($sql) === TRUE) {
            header("Location:../incidencias.php");
        } else {
            echo "Error al registrar el componente: " . $conn->error;
        }
    
} else {
    echo "Método de solicitud no válido.";
}

// Cerrar conexión
$conn->close();
?>