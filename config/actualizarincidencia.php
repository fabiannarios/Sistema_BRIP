<?php
include('./conecxion_bd.php');





if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id             = $_POST['codigo'];
    $tag            = $_POST['tag'];
    $usuario         = $_POST['usuario'];
    $fecha_reporte         = $_POST['fecha_reporte'];
    $prioridad        = $_POST['prioridad'];
    $observacion    = $_POST['observacion'];
    $estado         = $_POST['estado'];
    $fecha_solucion = $_POST['fecha_solucion'];

    $sql = "UPDATE incidencias 
            SET id_equipo = '".$tag."', 
                id_usuario = '".$usuario."',
                fecha_reporte = '".$fecha_reporte."', 
                prioridad = '".$prioridad."', 
                estado_solucion = '".$estado."', 
                observacion = '".$observacion."', 
                fecha_solucion = '".$fecha_solucion."'
            WHERE id_incidencia = '".$id."'";


try { 
      
    if ($conexion->query($sql) === TRUE) {
        
       echo "<script type='text/javascript'>";
            echo "alert('Se edito exitosamente');";
            echo "window.location.href = '../incidencias.php';";
            echo "</script>";
       
    } else {
        echo "Error al actualizar: " . $conexion->error;
    }
} catch (mysqli_sql_exception $e ) {

             $conexion->rollback();
            
            switch ($e->getCode()) {
                case 1062:
                  
                    echo "<script type='text/javascript'>";
            echo "alert('Incidencia duplicada');";
            echo "window.location.href = '../incidencias.php';";
            echo "</script>";

                    break;

                     case 1452:
                    echo "<script type='text/javascript'>";
                    echo "alert('Error en los datos');";
                    echo "window.location.href = '../incidencias.php';";
                    echo "</script>";
                        
                    break;
                
                default:
                 echo "<script type='text/javascript'>";
                    echo "alert('Error en los datos');";
                    echo "window.location.href = '../incidencias.php';";
                    echo "</script>";
                    break;
            }      
            
        }         
} else {
    echo "Método de solicitud no válido.";
}

$conexion->close();
?>