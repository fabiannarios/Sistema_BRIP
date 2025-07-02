<?php
include_once('conecxion_bd.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener y sanitizar los datos del formulario
    $repuesto = $_POST['repuesto'];
    $equipo = $_POST['equipo'];
    $mantenimiento = $_POST['mantenimiento'];
    $incidencia = $_POST['incidencia'];
    $estado_anterior = $_POST['estado_anterior'];
    $estado_nuevo = $_POST['estado_nuevo'];
    $observacion = $_POST['observacion'];
    $fecha_mantenimiento = $_POST['fecha_mantenimiento'];
    $responsable = $_POST['responsable'];


     try { 
    $sql = "INSERT INTO mantenimiento (id_repuesto, id_equipo, tipo_mantenimiento, id_incidencia, estado_anterior, estado_nuevo, observacion, fecha_mantenimiento, responsable_usuario) 
             VALUES ('$repuesto', '$equipo', '$mantenimiento', '$incidencia', '$estado_anterior' ,'$estado_nuevo', '$observacion' , '$fecha_mantenimiento', '$responsable')";


    if ($conexion->query($sql) === TRUE) {
     
        
            echo "<script type='text/javascript'>";
            echo "alert('Registro de mantenimiento ingresado con exito');";
            echo "window.location.href = '../views/mantenimiento.php';";
            echo "</script>";

    } else {
        echo "Error al registrar el componente: " . $conn->error;
    }


            echo "<script type='text/javascript'>";
            echo "alert('Error en el ingreso del mantenimiento');";
            echo "window.location.href = '../views/mantenimiento.php';";
            echo "</script>";
            } catch (mysqli_sql_exception $e ) {

             $conexion->rollback();
            
            switch ($e->getCode()) {
                case 1062:
                  
                    echo "<script type='text/javascript'>";
            echo "alert('Registro duplicado');";
            echo "window.location.href = '../views/mantenimiento.php';";
            echo "</script>";

                    break;

                     case 1452:
                    
                    echo "<script type='text/javascript'>";
                    echo "alert('Error en los datos');";
                    echo "window.location.href = '../views/mantenimiento.php';";
                    echo "</script>";
                        
                    break;
                
                default:
                 echo "<script type='text/javascript'>";
                    echo "alert('Error en los datos');";
                    echo "window.location.href = '../views/mantenimiento.php';";
                    echo "</script>";
                    break;
            }      
            
        }         


} else {
    echo "Método de solicitud no válido.";
}

// Cerrar conexión
$conexion->close();
