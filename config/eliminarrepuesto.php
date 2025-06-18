<?php
include('conecxion_bd.php');

if (isset($_GET['id_repuesto'])) {

    $id = $_GET['id_repuesto'];
    $sql = "DELETE FROM repuesto WHERE id_repuesto ='".$id."'";

    
    
    if ($conexion->query($sql) === TRUE) {
         echo "<script type='text/javascript'>";
            echo "alert('Repuesto eliminado');";
            echo "window.location.href = '../repuestos.php';";
            echo "</script>";
    } else {
        echo "Error al eliminar: " . $conexion->error;
    }
} else {
    echo "ID no especificado.";
}
?>