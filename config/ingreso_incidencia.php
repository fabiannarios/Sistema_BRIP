<?php

include_once('conecxion_bd.php');



// Validar que los datos fueron enviados correctamente
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener y sanitizar los datos del formulario
    $codigo = $_POST['codigo'];
    $usuario = $_POST['usuario'];
    $fecha_reporte = $_POST['fecha_reporte'];
    $prioridad = $_POST['prioridad'];
    $estado = $_POST['estado'];
    $observacion = $_POST['observacion'];
    $fecha_solucion = $_POST['fecha_solucion'];


    $sql1= "SELECT * FROM usuarios WHERE id_usuario = '$usuario'";
    $resultado = $conexion->query($sql1);
    $fila1 = $resultado->fetch_assoc();

    $sql2= "SELECT * FROM equipos WHERE id_equipo= '$codigo'";
    $resultado2 = $conexion->query($sql2);
    $fila2 = $resultado2->fetch_assoc();

    if ( $fila1['id_usuario'] != NULL || $fila2['id_equipo'] != NULL) {

        $sql = "INSERT INTO incidencias (id_equipo, id_usuario, fecha_reporte, prioridad, estado_solucion, observacion, fecha_solucion) 
                VALUES ('$codigo', '$usuario', '$fecha_reporte', '$prioridad', '$estado' ,'$observacion', '$fecha_solucion')";
        
        $sql3 = "SELECT * FROM incidencias WHERE id_incidencia = '$codigo'";
        $resultado3 = $conexion->query($sql3);
        $row = $resultado3->fetch_assoc();

        if ($row['id_incidencia'] == NULL) {
            
        if ($conexion->query($sql) === TRUE) {

            echo "<script type='text/javascript'>";
            echo "alert('Incidencia ingresada con exito');";
            echo "window.location.href = '../incidencias.php';";
            echo "</script>";
            
        } else {
            echo "Error al registrar el componente: " . $conn->error;
        }
        }
} else {
    header("Location:../incidencias.php");
}

    }
        

?>