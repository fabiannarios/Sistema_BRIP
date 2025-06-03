<?php

include('./config/conecxion_bd.php');

$consulta = "SELECT * FROM equipos";
$resultadoequipo = $conexion->query($consulta);

$consulta1 = "SELECT * FROM usuarios";
$resultadousuarios = $conexion->query($consulta1);
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar componente</title>
    <link rel="icon" href="./css/img/favicon.ico" sizes="any" />
    <link rel="stylesheet" href="./datatable/datatables1.css">
    <link href="./css/tabla.css" rel="stylesheet">
    <link href='./css/inicio.css' rel='stylesheet'>
    <link href="./css/header.css" rel="stylesheet">
    <link href='./css/bootstrap.css' rel='stylesheet'>
    <link href='./css/boxicons/fonts/basic/boxicons.css' rel='stylesheet'>

</head>

<body>
    <?php
    
    include_once('./header.php');
    $sql = "SELECT * FROM incidencias WHERE id_incidencia ='" . $_REQUEST['id_incidencia']."'";

    $resultado = $conexion->query($sql);

    $row = $resultado->fetch_assoc();

    ?>

    
    <div class=" text-center my-5">
        <h1> EDITAR INCIDENCIAS</h1>
    </div>


    <form class="row g-3 container-sm mt-4 mx-auto px-4 py-3 shadow p-3 mb-5 bg-body-tertiary rounded form-registro" action="./config/actualizarincidencia.php" method="POST">

        <div class="col-md-6">
            <label for="tag">TAG:</label>
            <datalist id="equipos">
                <?php
                while ($listaequipo = $resultadoequipo->fetch_assoc()) {
                    echo "<option value='" . $listaequipo['id_equipo'] . "'>";
                }
                ?>

            </datalist>
            <input type="text" id=tag" name="tag" list="equipos" value="<?php echo $row['id_equipo'] ?>" required>
        </div>

        <div class="col-md-6">
            <label for="usuario">Cedula del Autor:</label>
            <datalist id="usuarios">
                <?php
                while ($listausuario = $resultadousuarios->fetch_assoc()) {
                    echo "<option value='" . $listausuario['id_usuario'] . "'>";
                }
                ?>

            </datalist>
            <input type="text" id="usuario" name="usuario" list="usuarios" <?php echo $row['id_usuario'] ?> required>
        </div>

        <label for="fecha_reporte">Fecha de reportaje:</label>
        <input type="date" id="fecha_reporte" name="fecha_reporte" value="<?php echo $row['fecha_reporte'] ?>>">


        <div class="col-md-4">
            <label for="prioridad">prioridad:</label>
            <select class="form-select fs-4" id="prioridad" name="prioridad">
                <option value="alta">alta</option>
                <option value="media">media</option>
                <option value="baja">baja</option>
            </select>
        </div>

        <div class="col-md-4">
            <label for="estado">Estado:</label>
            <select class="form-select fs-4" id="estado" name="estado">
                <option value="no resuelta">No resuelta</option>
                <option value="resuelta">Ya resuelta</option>
                <option value="en proceso">En proceso</option>
            </select>
        </div>


        <label for="observacion">Observación:</label>
        <textarea id="observacion" name="observacion"></textarea>


        <label for="fecha_solucion">Fecha prevista de solucion :</label>
        <input type="date" id="fecha_solucion" name="fecha_solucion" value="<?php echo date("Y-m-d") ?>">

        <div class="col-12 my-3 text-center">
            <button type="submit" class="btn btn-success fs-4 rounded-pill">Ingresar Incidencia</button>
        </div>
        <input type="hidden" id="codigo" name="codigo" value="<?php echo $row['id_incidencia'] ?> " required>

    </form>

<script src="./js/peticiones.js"></script>
</body>

</html>