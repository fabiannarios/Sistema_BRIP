<?php
include('conecxion_bd.php');

if (isset($_GET['id_mantenimiento'])) {

    $id = $_GET['id_mantenimiento'];
    $sql = "DELETE FROM mantenimiento WHERE id_mantenimiento = '$id'";

    
    
    if ($conexion->query($sql) === TRUE) {
         echo "<script type='text/javascript'>";
            echo "alert('Registro de mantenimiento eliminado');";
            echo "window.location.href = '../mantenimiento.php';";
            echo "</script>";
        exit;
    } else {
        echo "Error al eliminar: " . $conexion->error;
    }
} else {
    echo "ID no especificado.";
}
?>