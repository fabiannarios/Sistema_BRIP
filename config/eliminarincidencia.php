<?php
include('conecxion_bd.php');

if (isset($_GET['id_incidencia'])) {

    $id = $_GET['id_incidencia'];
    $sql = "DELETE FROM incidencias WHERE id_incidencia = '$id'";

    
    
    if ($conexion->query($sql) === TRUE) {
        header("Location: ../incidencias.php");
        exit;
    } else {
        echo "Error al eliminar: " . $conexion->error;
    }
} else {
    echo "ID no especificado.";
}
?>