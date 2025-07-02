<?php
include('conecxion_bd.php');

if (isset($_GET['id_equipo'])) {

    $id = $_GET['id_equipo'];
    $sql = "DELETE FROM equipos WHERE id_equipo = '$id'";

    
    
    if ($conexion->query($sql) === TRUE) {
         echo "<script type='text/javascript'>";
            echo "alert('Equipo eliminado');";
            echo "window.location.href = '../views/equipos.php';";
            echo "</script>";
    } else {
        echo "Error al eliminar: " . $conexion->error;
    }
} else {
    echo "ID no especificado.";
}
?>