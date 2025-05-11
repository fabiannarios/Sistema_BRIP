<?php
include('./config/conexion.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Componentes</title>
    <link href="./css/stylees_tabla.css" rel="stylesheet">
    <link href="./css/bootstrap.css" rel="stylesheet">
</head>
<body>
    <h2 class="text-center">Listado de Componentes</h2>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Código</th>
                <th>Nombre</th>
                <th>Proceso</th>
                <th>Observaciones</th>
                <th>Estado</th>
                <th>Última Revisión</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $consulta = $conn->query("SELECT * FROM componentes");
            if ($consulta->num_rows > 0) {
                while ($fila = $consulta->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $fila['id'] . "</td>";
                    echo "<td>" . $fila['codigo'] . "</td>";
                    echo "<td>" . $fila['nombre'] . "</td>";
                    echo "<td>" . $fila['proceso'] . "</td>";
                    echo "<td>" . $fila['observacion'] . "</td>";
                    echo "<td>" . $fila['estado'] . "</td>";
                    echo "<td>" . $fila['ultima_revision'] . "</td>";
                    echo "<td>
                            <a href='editar.php?id=" . $fila['id'] . "' class='btn btn-primary btn-sm'>Editar</a>
                            <a href='eliminar.php?id=" . $fila['id'] . "' class='btn btn-danger btn-sm' onclick=\"return confirm('¿Seguro de eliminar?');\">Eliminar</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No existen registros</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>