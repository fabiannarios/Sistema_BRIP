<?php
include('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id             = $conn->real_escape_string($_POST['id']);
    $codigo         = $conn->real_escape_string($_POST['codigo']);
    $nombre         = $conn->real_escape_string($_POST['nombre']);
    $proceso        = $conn->real_escape_string($_POST['proceso']);
    $observacion    = $conn->real_escape_string($_POST['observacion']);
    $estado         = $conn->real_escape_string($_POST['estado']);
    $fecha_revision = $conn->real_escape_string($_POST['fecha_revision']);

    $sql = "UPDATE componentes 
            SET codigo = '$codigo', 
                nombre = '$nombre', 
                proceso = '$proceso', 
                observacion = '$observacion', 
                estado = '$estado', 
                ultima_revision = '$fecha_revision'
            WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../listar.php");
        exit;
    } else {
        echo "Error al actualizar: " . $conn->error;
    }
} else {
    echo "Método de solicitud no válido.";
}
?>