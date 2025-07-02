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

try { 
    if ($conexion->query($sql) === TRUE) {
        
           echo "<script type='text/javascript'>";
            echo "alert('Se edito exitosamente');";
            echo "window.location.href = '../views/configuracion.php';";
            echo "</script>";
       
    } 

    } catch (mysqli_sql_exception $e ) {

             $conexion->rollback();
            
            switch ($e->getCode()) {
                case 1062:
                  
                    echo "<script type='text/javascript'>";
            echo "alert('Usuario duplicado');";
            echo "window.location.href = '../views/configuracion.php';";
            echo "</script>";

                    break;

                     case 1452:
                    echo "<script type='text/javascript'>";
                    echo "alert('Error en los datos');";
                    echo "window.location.href = '../views/configuracion.php';";
                    echo "</script>";
                        
                    break;
                
                default:
                 echo "<script type='text/javascript'>";
                    echo "alert('Error en los datos');";
                    echo "window.location.href = '../views/configuracion.php';";
                    echo "</script>";
                    break;
            }      
            
        }         
} else {
    echo "Método de solicitud no válido.";
}

$conexion->close();
?>