<?php
include ('conecxion_bd.php');



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_usuario = $_POST['id_usuario'];
    $nombre = $_POST['nombre'];
    $id_rol = $_POST['id_rol'];
    $telefono = $_POST['telefono'];
    $fecha = $_POST['fecha_creacion'];

    $sql = "INSERT INTO `usuarios` (`id_usuario`,`nombre`,`id_rol`,`telefono`,`fecha_creacion`) 
            VALUES ('$id_usuario ','$nombre', '$id_rol','$telefono','$fecha')";

    if ($conexion->query($sql) === TRUE) {
         echo "<script type='text/javascript'>";
            echo "alert('Responsable ingresado con exito');";
            echo "window.location.href = '../inicio.php';";
          
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }
}

$conexion->close();
?>
?>