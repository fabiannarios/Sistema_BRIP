<?php
include('conecxion_bd.php');
// Validar que los datos fueron enviados correctamente
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener y sanitizar los datos del formulario
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $planta = $_POST['planta'];
    $id_proceso = $_POST['proceso'];
    $observacion = $_POST['observacion'];
    $estado = $_POST['estado'];
    $fecha_revision = $_POST['fecha_revision'];

    // Verificar que no haya campos vacíos
   
        // Insertar datos en la base de datos


        $sql = "INSERT INTO equipos (id_equipo, nombre, id_planta, id_proceso, observacion, estado, ultima_revision) 
                VALUES ('$codigo', '$nombre', '$planta', '$id_proceso', '$observacion', '$estado', '$fecha_revision')";

        $sql1 = "SELECT * FROM equipos WHERE id_equipo = '$codigo' AND nombre = '$nombre'";
        $resultado = $conexion->query($sql1);
        $row = $resultado->fetch_assoc();
        

if ($row['id_equipo'] == NULL && $row['nombre'] == NULL) {

        if ($conexion->query($sql) === TRUE) {
          
              echo "<script type='text/javascript'>";
            echo "alert('Equipo ingresado con exito');";
            echo "window.location.href = '../views/equipos.php';";
            echo "</script>";
        } else {
            echo "Error al registrar el componente: " . $conexion->error;
        }
} else {
            echo "<script type='text/javascript'>";
            echo "alert('Equipo duplicado');";
            echo "window.location.href = '../views/equipos.php';";
            echo "</script>";
}
} else {
    echo "Método de solicitud no válido.";
}

// Cerrar conexión
$conexion->close();
?>