<?php
include('./conecxion_bd.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id'];
    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $departamento = $_POST['departamento'];
    
    
   

    $sql = "UPDATE responsables
            SET id_responsable = '".$cedula."', 
                nombre = '".$nombre."',
                departamento = '".$departamento."'
            WHERE id_responsable = '".$id."'";


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