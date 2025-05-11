
<!--formulario-->

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar componente</title>
    <link href="./css/tabla.css" rel="stylesheet">
    <link href="./css/bootstrap.css" rel="stylesheet">
    <link href="./css/boxicons-2.1.4/css/boxicons.css" rel="stylesheet">
</head>

<body>
    <h2 class="text-center">Registro de Componentes</h2>
    <form action="./config/procesar.php" method="POST">
        <label for="codigo">Código:</label>
        <input type="text" id="codigo" name="codigo" required>

        <label for="nombre">Nombre del Componente:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="proceso">Proceso:</label>
        <select id="proceso" name="proceso">
            <option value="HIDRO DESULFURACION">HIDRO DESULFURACION</option>
            <option value="REFORMACION PRIMARIA">REFORMACION PRIMARIA</option>
            <option value="REFORMACION SECUNDARIA">REFORMACION SECUNDARIA</option>
            <option value="CONVERSION DE ALTA Y BAJA TEMPERATURA">CONVERSION DE ALTA Y BAJA TEMPERATURA</option>
            <option value="REMOCION DE CO2">REMOCION DE CO2</option>
            <option value="METANACION">METANACION</option>
            <option value="COMPRESION Y  SINTESIS">COMPRESION Y  SINTESIS</option>
            <option value="SISTEMA DE REFRIGERACION DE AMONIACO (NH3)">SISTEMA DE REFRIGERACION DE AMONIACO (NH3)</option>
        </select>

        <label for="observacion">Observación:</label>
        <textarea id="observacion" name="observacion"></textarea>

        <label for="estado">Estado:</label>
        <select id="estado" name="estado">
            <option value="verde">Disponible</option>
            <option value="amarillo">Baja Confiabilidad</option>
            <option value="rojo">No Disponible</option>
        </select>

        <label for="fecha_revision">Última Revisión:</label>
        <input type="date" id="fecha_revision" name="fecha_revision">

        <button type="submit" class="btn btn-success">Guardar Componente</button>
    </form>
</body>

</html>

<?php
include('conexion_registro.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener y sanitizar los datos
    $codigo         = $conn->real_escape_string($_POST['codigo']);
    $nombre         = $conn->real_escape_string($_POST['nombre']);
    $proceso        = $conn->real_escape_string($_POST['proceso']);
    $observacion    = $conn->real_escape_string($_POST['observacion']);
    $estado         = $conn->real_escape_string($_POST['estado']);
    $fecha_revision = $conn->real_escape_string($_POST['fecha_revision']);

    $sql = "INSERT INTO componentes (codigo, nombre, proceso, observacion, estado, ultima_revision) 
            VALUES ('$codigo', '$nombre', '$proceso', '$observacion', '$estado', '$fecha_revision')";

    if ($conn->query($sql) === TRUE) {
        // Redirigir al listado si la inserción fue exitosa
        header("Location: ../listar.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Método de solicitud no válido.";
}
?>

<!--insertar registro-->

