<?php
include_once('conecxion_bd.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener y sanitizar los datos del formulario
    $id = $_POST['id'];
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
     
                    $sql = "UPDATE
                    mantenimiento SET
                    id_repuesto = '".$repuesto."', 
                    id_equipo = '".$equipo."',
                    tipo_mantenimiento = '".$mantenimiento."',
                    id_incidencia = '".$incidencia."',
                    estado_anterior = '".$estado_anterior."',
                    estado_nuevo = '".$estado_nuevo."',
                    observacion ='".$observacion."',
                    fecha_mantenimiento ='".$fecha_mantenimiento."',
                    id_responsable ='".$responsable."'
                    WHERE id_mantenimiento = '".$id." ' ";

    if ($conexion->query($sql) === TRUE) {
     
        header("Location:../mantenimiento.php");
    } else {
        echo "Error al registrar el componente: " . $conn->error;
    }
} else{
 
echo "<script type='text/javascript'>";
echo "alert('Error en los datos');";
echo "window.location.href = '../editarmantenimiento.php?id_mantenimiento=".$id."';";
echo "</script>";
 
}



} else {
    echo "Método de solicitud no válido.";
}

// Cerrar conexión
$conexion->close();
