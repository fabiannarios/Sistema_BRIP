<?php

include_once('conecxion_bd.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener y sanitizar los datos del formulario
    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $departamento = $_POST['departamento'];
    

   
        $sql = "INSERT INTO responsables (id_responsable, nombre, departamento) 
                VALUES ('$cedula', '$nombre', '$departamento')";

        $sql1 = "SELECT * FROM responsables WHERE id_responsable = '$cedula' AND nombre = '$nombre'";
        $resultado = $conexion->query($sql1);
        $row = $resultado->fetch_assoc();
        

if ($row['id_responsable'] == NULL && $row['nombre'] == NULL) {

        if ($conexion->query($sql) === TRUE) {
            
            echo "<script type='text/javascript'>";
            echo "alert('Responsable ingresado con exito');";
            echo "window.location.href = '../mantenimiento.php';";
            echo "</script>";
        } else {
            echo "Error al registrar el componente: " . $conn->error;
        }

    } else {
         echo "<script type='text/javascript'>";
            echo "alert('Responsable duplicado');";
            echo "window.location.href = '../equipos.php';";
            echo "</script>";
    }
    
    }
        
?>