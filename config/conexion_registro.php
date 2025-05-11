<?php
include '../config/conecxion_bd.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_usuario = $_POST['id_usuario'];
    $nombre = $_POST['nombre'];
    $id_rol = $_POST['id_rol'];
    $telefono = $_POST['telefono'];
    $fecha = $_POST['fecha_creacion'];

    $sql = "INSERT INTO `usuarios` (`id_usuario`,`nombre`,`id_rol`,`telefono`,`fecha_creacion`) 
            VALUES ('$id_usuario ','$nombre', '$id_rol','$telefono','$fecha')";

    if ($conexion->query($sql) === TRUE) {
        echo "
        exitoso
        ";
        header("Location:../views/login.php");
    
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }
}

$conexion->close();
?>
?>