<?php
include_once('conecxion_bd.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener y sanitizar los datos del formulario
    $id = $_POST['id'];
    $repuesto = $_POST['repuesto'];
    $equipo = $_POST['equipo'];
    $mantenimiento = $_POST['mantenimiento'];
    $incidencia = $_POST['incidencia'];
    $estado_anterior = $_POST['estado_anterior'];
    $estado_nuevo = $_POST['estado_nuevo'];
    $observacion = $_POST['observacion'];
    $fecha_mantenimiento = $_POST['fecha_mantenimiento'];
    $responsable = $_POST['responsable'];



     
                    $sql = "UPDATE
                    mantenimiento SET
                    id_repuesto = '".$repuesto."', 
                    id_equipo = '".$equipo."',
                    tipo_mantenimiento = '".$mantenimiento."',
                    id_incidencia = '".$incidencia."',
                    estado_anterior = '".$estado_anterior."',
                    estado_nuevo = '".$estado_nuevo."',
                    observacion ='".$observacion."',
                    fecha_mantenimiento ='".$fecha_mantenimiento."',
                    responsable_usuario ='".$responsable."'
                    WHERE id_mantenimiento = '".$id." ' ";
try { 
    if ($conexion->query($sql) === TRUE) {
     
       echo "<script type='text/javascript'>";
            echo "alert('Se edito exitosamente');";
            echo "window.location.href = '../views/mantenimiento.php';";
            echo "</script>";
       
    } else {
        echo "Error al registrar el componente: " . $conn->error;
    }

    } catch (mysqli_sql_exception $e ) {

             $conexion->rollback();
            
            switch ($e->getCode()) {
                case 1062:
                  
                    echo "<script type='text/javascript'>";
            echo "alert('Incidencia duplicada');";
           echo "window.location.href = '../views/editarmantenimiento.php?id_mantenimiento=".$id."';";
            echo "</script>";

                    break;

                     case 1452:
                    echo "<script type='text/javascript'>";
                    echo "alert('Error en los datos');";
                    echo "window.location.href = '../views/editarmantenimiento.php?id_mantenimiento=".$id."';";
                    echo "</script>";
                        
                    break;
                
                default:
                 echo "<script type='text/javascript'>";
                    echo "alert('Error en los datos');";
                    echo "window.location.href = '../views/editarmantenimiento.php?id_mantenimiento=".$id."';";
                    echo "</script>";
                    break;
            }      
            
        }         



} else {
    echo "Método de solicitud no válido.";
}

// Cerrar conexión
$conexion->close();
