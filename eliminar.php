<?php
include('./config/conexion.php');

if (isset($_GET['id'])) {
    $id = $conn->real_escape_string($_GET['id']);
    $sql = "DELETE FROM componentes WHERE id = $id";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: listar.php");
        exit;
    } else {
        echo "Error al eliminar: " . $conn->error;
    }
} else {
    echo "ID no especificado.";
}
?>