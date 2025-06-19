<?php

include_once('conecxion_bd.php');

// Validar que los datos fueron enviados correctamente
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener y sanitizar los datos del formulario
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $costo = $_POST['costo'];
    $cantidad = $_POST['cantidad'];
    $estado = $_POST['estado'];
    $fecha_solicitud = $_POST['fecha_solicitud'];
    $fecha_recepcion = $_POST['fecha_recepcion'];


    try { 
        $sql = "INSERT INTO repuesto (id_repuesto, nombre, estado, costo, fecha_solicitud, fecha_recepcion, cantidad) 
                VALUES ('$codigo', '$nombre', '$estado', '$costo', '$fecha_solicitud' ,'$fecha_recepcion', '$cantidad')";

        if ($conexion->query($sql) === TRUE) {
             echo "<script type='text/javascript'>";
            echo "alert('Repuesto ingresado con exito');";
            echo "window.location.href = '../repuestos.php';";
            echo "</script>";
        } else {
            echo "Error al registrar el componente: " . $conn->error;
        }

        } catch (mysqli_sql_exception $e ) {

             $conexion->rollback();
            
            switch ($e->getCode()) {
                case 1062:
                  
                    echo "<script type='text/javascript'>";
            echo "alert('Repuesto duplicado');";
            echo "window.location.href = '../repuestos.php';";
            echo "</script>";

                    break;

                     case 1452:
                        
                        
                        
                    echo "<script type='text/javascript'>";
                    echo "alert('Error en los datos');";
                    echo "window.location.href = '../repuestos.php';";
                    echo "</script>";
                        
                    break;
                
                default:
                 echo "<script type='text/javascript'>";
                    echo "alert('Error en los datos');";
                    echo "window.location.href = '../repuestos.php';";
                    echo "</script>";
                    break;
            }      
            
        }         
    
} else {
    echo "Método de solicitud no válido.";
}

// Cerrar conexión
$conn->close();
?>