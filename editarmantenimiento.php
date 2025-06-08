<?php

include('./config/conecxion_bd.php');

$consulta = "SELECT * FROM equipos";
$resultadoequipo = $conexion->query($consulta);

$consulta1 = "SELECT * FROM repuesto";
$resultadorepuestos = $conexion->query($consulta1);

$consulta2 = "SELECT id_incidencia FROM incidencias";
$resultadoincidencias = $conexion->query($consulta2);

$consulta3 = "SELECT * FROM responsables";
$resultadoresponsable = $conexion->query($consulta3);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mantenimiento</title>
    <link rel="icon" href="favicon.ico" sizes="any" />
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
    $sql = "SELECT * FROM mantenimiento WHERE id_mantenimiento ='" . $_REQUEST['id_mantenimiento']."'";

    $resultado = $conexion->query($sql);

    $row = $resultado->fetch_assoc();
    ?>

    <h1 class="text-center  mt-4 border-bottom-4">MANTENIMIENTO</h1>

    <form class="row g-3 container-sm mt-4 mx-auto px-4 py-3 shadow p-3 mb-5 bg-body-tertiary rounded form-registro" action="./config/actualizarmantenimiento.php" method="POST">

        <div class="col-md-6">
            <label for="repuesto">Codigo del repuesto:</label>
            <datalist id="repuesto">
                <?php
                while ($listarepuesto = $resultadorepuestos->fetch_assoc()) {
                    echo "<option value='" . $listarepuesto['id_repuesto'] . "'>";
                }
                ?>


            </datalist>
            <input type="text" id="repuesto" name="repuesto" list="repuesto" value="<?php echo $row['id_repuesto'] ?> " required>
        </div>



        <div class="col-md-6">
            <label for="equipo">TAG:</label>
            <datalist id="equipo">
                <?php
                while ($listaequipo = $resultadoequipo->fetch_assoc()) {
                    echo "<option value='" . $listaequipo['id_equipo'] . "'>";
                }
                ?>

            </datalist>
            <input type="text" id="equipo" name="equipo" list="equipo" value="<?php echo $row['id_equipo'] ?> "  required>
        </div>

        <div class="col-md-12">
            <label for="mantenimiento">Tipo de mantenimiento:</label>
            <select class="form-select fs-4" id="mantenimiento" name="mantenimiento">
                <option value="correctivo">Correctivo</option>
                <option value="preventivo">Preventivo</option>
                <option value="predictivo">Predictivo</option>
            </select>
        </div>

        <div class="col-md-8">
            <label for="incidencia">Codigo de la incidencia:</label>
            <datalist id="incidencia">
                <?php
                while ($listaincidencia = $resultadoincidencias->fetch_assoc()) {
                    echo "<option value='" . $listaincidencia['id_incidencia'] . "'>";
                }
                ?>

            </datalist>
            <input type="text" id="incidencia" name="incidencia" list="incidencia" value="<?php echo $row['id_incidencia'] ?>" required>
        </div>

        <div class="col-md-6">
            <label for="estado_anterior">Estado anterior:</label>
            <select class="form-select fs-4" id="estado_anterior" name="estado_anterior">
                <option value="No resuelta">No resuelta</option>
                <option value="Resuelta">Ya resuelta</option>
                <option value="En proceso">En proceso</option>
            </select>
        </div>

        <div class="col-md-6">
            <label for="estado_nuevo">Estado nuevo:</label>
            <select class="form-select fs-4" id="estado_nuevo" name="estado_nuevo">
                <option value="no resuelta">No resuelta</option>
                <option value="resuelta">Ya resuelta</option>
                <option value="en proceso">En proceso</option>
            </select>
        </div>

        <label for="observacion">Observación:</label>
        <textarea id="observacion" name="observacion"></textarea>

        <label for="fecha_mantenimiento">Fecha del mantenimiento:</label>
        <input type="date" id="fecha_mantenimiento" name="fecha_mantenimiento" value="<?php $d = strtotime("yesterday");
                                                                                        echo date("Y-m-d") ?>">

        <div class="col-md-12">
            <label for="responsable">Cedula del responsable:</label>
            <datalist id="responsable">
                <?php
                while ($listaresponsable = $resultadoresponsable->fetch_assoc()) {
                    echo "<option value='" . $listaresponsable['id_responsable'] . "'>";
                }
                ?>

            </datalist>
            <input type="text" id="responsable" name="responsable" list="responsable" value="<?php echo $row['id_responsable'] ?> " required>
        </div>

        <div class="col-12 my-3 text-center">
            <button type="submit" class="btn btn-success fs-4 rounded-pill">Ingresar Incidencia</button>
        </div>
        <input type="hidden" id="id" name="id" value="<?php echo $row['id_mantenimiento'] ?>" required>
    </form>
</body>
</html>