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



            $sql1= "SELECT * FROM usuarios WHERE id_usuario = '$usuario'";
    $resultado = $conexion->query($sql1);
    $fila1 = $resultado->fetch_assoc();

    $sql2= "SELECT * FROM equipos WHERE id_equipo= '$tag'";
    $resultado2 = $conexion->query($sql2);
    $fila2 = $resultado2->fetch_assoc();


     if ( $fila1['id_usuario'] != NULL || $fila2['id_equipo'] != NULL) {

    if ($conexion->query($sql) === TRUE) {
        
        header("Location: ../incidencias.php");
       
    } else {
        echo "Error al actualizar: " . $conexion->error;
    }
} else {
    echo "<script type='text/javascript'>";
echo "alert('Error en los datos');";
echo "window.location.href = '../editarincidencia.php?id_incidencia=".$id."';";
echo "</script>";
}
} else {
    echo "Método de solicitud no válido.";
}

$conexion->close();
?>