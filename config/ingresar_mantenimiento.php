<?php
include_once('conecxion_bd.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener y sanitizar los datos del formulario
    $repuesto = $_POST['repuesto'];
    $equipo = $_POST['equipo'];
    $mantenimiento = $_POST['mantenimiento'];
    $incidencia = $_POST['incidencia'];
    $estado_anterior = $_POST['estado_anterior'];
    $estado_nuevo = $_POST['estado_nuevo'];
    $observacion = $_POST['observacion'];
    $fecha_mantenimiento = $_POST['fecha_mantenimiento'];
    $responsable = $_POST['responsable'];

    // Verificar que no haya campos vacíos

    // Insertar datos en la base de datos
    $sql = "INSERT INTO mantenimiento (id_repuesto, id_equipo, tipo_mantenimiento, id_incidencia, estado_anterior, estado_nuevo, observacion, fecha_mantenimiento, id_responsable) 
             VALUES ('$repuesto', '$equipo', '$mantenimiento', '$incidencia', '$estado_anterior' ,'$estado_nuevo', '$observacion' , '$fecha_mantenimiento', '$responsable')";

    if ($conexion->query($sql) === TRUE) {
     
        header("Location:../mantenimiento.php");
    } else {
        echo "Error al registrar el componente: " . $conn->error;
    }
} else {
    echo "Método de solicitud no válido.";
}

// Cerrar conexión
$conexion->close();
