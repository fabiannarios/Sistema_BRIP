<?php
include('conecxion_bd.php');

if (isset($_GET['id_incidencia'])) {

    $id = $_GET['id_incidencia'];
    $sql = "DELETE FROM incidencias WHERE id_incidencia = '$id'";

    
    
    if ($conexion->query($sql) === TRUE) {
         echo "<script type='text/javascript'>";
            echo "alert('Registro de incidencia eliminado');";
            echo "window.location.href = '../incidencias.php';";
            echo "</script>";
    } else {
        echo "Error al eliminar: " . $conexion->error;
    }
} else {
    echo "ID no especificado.";
}
?>