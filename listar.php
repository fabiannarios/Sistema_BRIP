<?php
include('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener y sanitizar los datos
    $codigo         = $conn->real_escape_string($_POST['codigo']);
    $nombre         = $conn->real_escape_string($_POST['nombre']);
    $proceso        = $conn->real_escape_string($_POST['proceso']);
    $observacion    = $conn->real_escape_string($_POST['observacion']);
    $estado         = $conn->real_escape_string($_POST['estado']);
    $fecha_revision = $conn->real_escape_string($_POST['fecha_revision']);

    $sql = "INSERT INTO componentes (codigo, nombre, proceso, observacion, estado, ultima_revision) 
            VALUES ('$codigo', '$nombre', '$proceso', '$observacion', '$estado', '$fecha_revision')";

    if ($conn->query($sql) === TRUE) {
        // Redirigir al listado si la inserción fue exitosa
        header("Location: ../listar.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Método de solicitud no válido.";
}
?>