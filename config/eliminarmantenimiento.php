<?php
include('conecxion_bd.php');

if (isset($_GET['id_mantenimiento'])) {

    $id = $_GET['id_mantenimiento'];
    $sql = "DELETE FROM mantenimiento WHERE id_mantenimiento = '$id'";

    
    
    if ($conexion->query($sql) === TRUE) {
        header("Location: ../mantenimiento.php");
        exit;
    } else {
        echo "Error al eliminar: " . $conexion->error;
    }
} else {
    echo "ID no especificado.";
}
?>