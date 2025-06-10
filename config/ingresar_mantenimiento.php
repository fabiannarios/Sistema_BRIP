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


    $sql1= "SELECT id_repuesto FROM repuesto WHERE id_repuesto = '$repuesto'";
    $resultado1 = $conexion->query($sql1);
    $fila1 = $resultado1->fetch_assoc();

    $sql2= "SELECT id_equipo FROM equipos WHERE id_equipo= '$equipo'";
    $resultado2 = $conexion->query($sql2);
    $fila2 = $resultado2->fetch_assoc();

    $sql3= "SELECT id_responsable FROM responsables where id_responsable = '$responsable'";
    $resultado3 = $conexion->query($sql3);
    $fila3 = $resultado3->fetch_assoc();

    $sql4= "SELECT id_incidencia FROM incidencias where id_incidencia = '$incidencia'";
    $resultado4 = $conexion->query($sql4);
    $fila4 = $resultado4->fetch_assoc();


    if ($fila1['id_repuesto'] != NULL && $fila2['id_equipo'] != NULL && $fila3['id_responsable'] != NULL && $fila4['id_incidencia'] != NULL) {
     
    $sql = "INSERT INTO mantenimiento (id_repuesto, id_equipo, tipo_mantenimiento, id_incidencia, estado_anterior, estado_nuevo, observacion, fecha_mantenimiento, id_responsable) 
             VALUES ('$repuesto', '$equipo', '$mantenimiento', '$incidencia', '$estado_anterior' ,'$estado_nuevo', '$observacion' , '$fecha_mantenimiento', '$responsable')";


    if ($conexion->query($sql) === TRUE) {
     
        
            echo "<script type='text/javascript'>";
            echo "alert('Registro de mantenimiento ingresado con exito');";
            echo "window.location.href = '../mantenimiento.php';";
            echo "</script>";

    } else {
        echo "Error al registrar el componente: " . $conn->error;
    }
} else{
 
            echo "<script type='text/javascript'>";
            echo "alert('Error en el ingreso del mantenimiento');";
            echo "window.location.href = '../mantenimiento.php';";
            echo "</script>";
}



} else {
    echo "Método de solicitud no válido.";
}

// Cerrar conexión
$conexion->close();
