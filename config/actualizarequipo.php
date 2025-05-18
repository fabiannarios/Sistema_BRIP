<?php
include('./conecxion_bd.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id             = $_POST['codigo'];
    $nombre         = $_POST['nombre'];
    $planta         = $_POST['planta'];
    $proceso        = $_POST['proceso'];
    $observacion    = $_POST['observacion'];
    $estado         = $_POST['estado'];
    $fecha_revision = $_POST['fecha_revision'];

    $sql = "UPDATE equipos 
            SET id_equipo = '".$id."', 
                nombre = '".$nombre."',
                id_planta = '".$planta."', 
                id_proceso = '".$proceso."', 
                observacion = '".$observacion."', 
                estado = '".$estado."', 
                ultima_revision = '".$fecha_revision."'
            WHERE id_equipo = '".$id."'";

    if ($conexion->query($sql) === TRUE) {
        header("Location: ../equipos.php");
       
    } else {
        echo "Error al actualizar: " . $conexion->error;
    }
} else {
    echo "Método de solicitud no válido.";
}

$conexion->close();
?>