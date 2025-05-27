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
    <link rel="icon" href="./css/img/favicon.ico" sizes="any" />
    <link rel="stylesheet" href="./datatable/datatables1.css">
    <link href="./css/tabla.css" rel="stylesheet">
    <link href='./css/inicio.css' rel='stylesheet'>
    <link href="./css/header.css" rel="stylesheet">
    <link href='./css/bootstrap.css' rel='stylesheet'>
    <link href='./css/boxicons-2.1.4/css/boxicons.css' rel='stylesheet'>

</head>

<body>

    <?php include_once('./header.php') ?>

    <h1 class="text-center  mt-4 border-bottom-4">MANTENIMIENTO</h1>

    <form class="row g-3 container-sm mt-4 mx-auto px-4 py-3 shadow p-3 mb-5 bg-body-tertiary rounded form-registro" action="./config/ingresar_mantenimiento.php" method="POST">

        <div class="col-md-6">
            <label for="repuesto">Codigo del repuesto:</label>
            <datalist id="repuesto">
                <?php
                while ($listarepuesto = $resultadorepuestos->fetch_assoc()) {
                    echo "<option value='" . $listarepuesto['id_repuesto'] . "'>";
                }
                ?>


            </datalist>
            <input type="text" id="repuesto" name="repuesto" list="repuesto" required>
        </div>



        <div class="col-md-6">
            <label for="equipo">Codigo del equipo:</label>
            <datalist id="equipo">
                <?php
                while ($listaequipo = $resultadoequipo->fetch_assoc()) {
                    echo "<option value='" . $listaequipo['id_equipo'] . "'>";
                }
                ?>

            </datalist>
            <input type="text" id="equipo" name="equipo" list="equipo" required>
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
            <input type="text" id="incidencia" name="incidencia" list="incidencia" required>
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
            <input type="text" id="responsable" name="responsable" list="responsable" required>
        </div>

        <div class="col-12 my-3 text-center">
            <button type="submit" class="btn btn-success fs-4 rounded-pill">Ingresar Incidencia</button>
        </div>
    </form>

    <section class="my-5">
        <h1 class="heading-1">Historial de Mantenimiento</h1>


        <div class="container-fluid">
            <?php
            $sql = "SELECT * FROM mantenimiento";
            $result = $conexion->query($sql);
            if ($result->num_rows > 0) {
            ?>
                <table id='tabla' class='pequiven-table'>
                    <thead>
                        <tr>

                            <th scope='col'>Codigo del repuesto</th>
                            <th scope='col'>Nombre del equipo</th>
                            <th scope='col'>Tipo de mantenimiento</th>
                            <th scope='col'>Codigo de la incidencia</th>
                            <th scope='col'>Estado anterior</th>
                            <th scope='col'>Estado nuevo</th>
                            <th scope='col'>Observaciones</th>
                            <th scope='col'>Fecha del mantenimiento</th>
                            <th scope='col'>Cedula del responsable</th>
                            <th scope='col'>Nombre del responsable</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        while ($row = $result->fetch_assoc()) {
                        ?>
                            <tr>

                                <td><?php
                                    $sql2 = "SELECT * FROM repuesto WHERE id_repuesto ='" . $row['id_repuesto'] . "'";
                                    $resultado2 = $conexion->query($sql2);

                                    $row2 = $resultado2->fetch_assoc();

                                    echo $row2['id_repuesto'] ?></td>



                                <td><?php $sql1 = "SELECT * FROM equipos WHERE id_equipo='" . $row['id_equipo'] . "'";
                                    $resultado = $conexion->query($sql1);

                                    $row1 = $resultado->fetch_assoc();

                                    echo $row1['nombre']            ?></td>



                                <td><?php echo $row['tipo_mantenimiento'] ?> </td>

                                <td><?php $sql3 = "SELECT * FROM incidencias WHERE id_incidencia='" . $row['id_incidencia'] . "'";
                                    $resultado3 = $conexion->query($sql3);

                                    $row3 = $resultado3->fetch_assoc();

                                    echo $row3['id_incidencia']            ?></td>

                                <td><?php echo $row['estado_anterior'] ?> </td>

                                <?php

                                if ($row['estado_nuevo'] == 'ya resuelta') {

                                    echo "<td class = 'tabla-verde'> Disponible </td>";

                                } else if ($row['estado_nuevo'] == 'en proceso') {

                                    echo "<td class = 'tabla-amarillo'> Baja confiabilidad </td>";

                                } else {

                                    echo "<td class = 'tabla-rojo'> No disponible </td>";

                                }
                                ?>


                                <td><?php echo $row['observacion'] ?></td>

                                <td><?php echo $row['fecha_mantenimiento'] ?></td>

                                <td><?php echo $row['id_responsable'] ?></td>

                                <td><?php $sql4 = "SELECT * FROM responsables WHERE id_responsable='" . $row['id_responsable'] . "'";
                                    $resultado4 = $conexion->query($sql4);

                                    $row4 = $resultado4->fetch_assoc();

                                    echo $row4['nombre']            ?></td>

                            </tr>
                        <?php
                        } ?>
                    </tbody>

                <?php
            }
            $conexion->close();
                ?>
                </table>
        </div>

    </section>


    <script src="./jquery/jquery.js"></script>
    <script src="./datatable/datatables1.js"></script>
    <script>
        $(document).ready(function() {
            $('#tabla').DataTable({
                lengthMenu: [5, 10, 25, 50, 100],
                pageLength: 5,
                language: {
                    lengthMenu: "Mostrar MENU registros por pagina",
                    zeroRecords: "Sin resultado - disculpa",
                    info: "Mostrando la pagina PAGE de PAGES",
                    infoEmpty: "No records available",
                    infoFiltered: "(filtrado de  MAX registros totales)",
                    search: "Buscar: ",
                    paginate: {
                        next: "Siguientes",
                        previous: "Anterior"
                    },
                }
            });
        });
    </script>



</body>

</html>