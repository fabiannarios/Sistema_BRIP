<?php
include('conecxion_bd.php');

if (isset($_GET['id_responsable'])) {

    $id = $_GET['id_responsable'];
    $sql = "DELETE FROM responsables WHERE id_responsable = '$id'";

    
    
    if ($conexion->query($sql) === TRUE) {
         echo "<script type='text/javascript'>";
            echo "alert('Responsable eliminado');";
            echo "window.location.href = '../configuracion.php';";
            echo "</script>";
    } else {
        echo "Error al eliminar: " . $conexion->error;
    }
} else {
    echo "ID no especificado.";
}
?>