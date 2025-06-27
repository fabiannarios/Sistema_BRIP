<?php
include('./conecxion_bd.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id'];
    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $complejo = $_POST['complejo'];
    $planta = $_POST['planta'];
    $rol = $_POST['cargo'];
    $departamento = $_POST['departamento'];
    

    $sql = "UPDATE usuarios 
            SET id_usuario = '".$cedula."', 
                nombre = '".$nombre."',
                cargo = '".$rol."', 
                id_planta = '".$planta."',
                departamento = '".$departamento."',
                nombre_complejo = '". $complejo ."',
                telefono = '".$telefono."'
            WHERE id_usuario = '".$id."'";


    if ($conexion->query($sql) === TRUE) {
        
           echo "<script type='text/javascript'>";
            echo "alert('Se edito exitosamente');";
            echo "window.location.href = '../configuracion.php';";
            echo "</script>";
       
    } else {
        echo "<script type='text/javascript'>";
            echo "alert('Error en los datos');";
            echo "window.location.href = '../configuracion.php?id_usuario=".$id."';";
            echo "</script>";
        echo "Error al actualizar: " . $conexion->error;
    }
} else {
    echo "Método de solicitud no válido.";
}

$conexion->close();
?>