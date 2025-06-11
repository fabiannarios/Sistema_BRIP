<?php
include('conecxion_bd.php');

if (isset($_GET['id_usuario'])) {

    $id = $_GET['id_usuario'];
    $sql = "DELETE FROM usuarios WHERE id_usuario = '$id'";

    
    
    if ($conexion->query($sql) === TRUE) {
         echo "<script type='text/javascript'>";
            echo "alert('Registro de incidencia eliminado');";
            echo "window.location.href = '../configuracion.php';";
            echo "</script>";
    } else {
        echo "Error al eliminar: " . $conexion->error;
    }
} else {
    echo "ID no especificado.";
}
?>