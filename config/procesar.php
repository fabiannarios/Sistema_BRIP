<?php
// Configuración de conexión a la base de datos
$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$bd = "cphc_amoniaco";

$conn = new mysqli($servidor, $usuario, $contrasena, $bd);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Validar que los datos fueron enviados correctamente
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener y sanitizar los datos del formulario
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $id_proceso = $_POST['proceso'];
    $observacion = $_POST['observacion'];
    $estado = $_POST['estado'];
    $fecha_revision = $_POST['fecha_revision'];

    // Verificar que no haya campos vacíos
    if (empty($codigo) || empty($nombre) || empty($id_proceso) || empty($estado) || empty($fecha_revision)) {
        echo "Todos los campos requeridos deben estar completos.";
    } else {
        // Insertar datos en la base de datos
        $sql = "INSERT INTO equipos (id_equipo, nombre, id_proceso, observacion, estado, ultima_revision) 
                VALUES ('$codigo', '$nombre', '$id_proceso', '$observacion', '$estado', '$fecha_revision')";

        if ($conn->query($sql) === TRUE) {
            header("Location:../equipos.php");
        } else {
            echo "Error al registrar el componente: " . $conn->error;
        }
    }
} else {
    echo "Método de solicitud no válido.";
}

// Cerrar conexión
$conn->close();
?>