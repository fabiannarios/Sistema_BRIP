<?php

include_once('conecxion_bd.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener y sanitizar los datos del formulario
    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $departamento = $_POST['departamento'];
    

   
        $sql = "INSERT INTO responsables (id_responsable, nombre, departamento) 
                VALUES ('$cedula', '$nombre', '$departamento')";

        if ($conexion->query($sql) === TRUE) {
            
            echo "<script type='text/javascript'>";
            echo "alert('Error en los datos');";
            echo "window.location.href = '../mantenimiento.php';";
            echo "</script>";
        } else {
            echo "Error al registrar el componente: " . $conn->error;
        }
    
    }
        
?>