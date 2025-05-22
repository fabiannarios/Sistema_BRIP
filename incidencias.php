<?php

include('./config/conecxion_bd.php');

$consulta = "SELECT * FROM equipos";
$resultadoequipo = $conexion->query($consulta);

$consulta1 = "SELECT * FROM usuarios";
$resultadousuarios = $conexion->query($consulta1);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incidencias</title>

    <link rel="icon" href="./css/img/favicon.ico" sizes="any" />
    <link rel="stylesheet" href="./datatable/datatables1.css">
    <link href="./css/tabla.css" rel="stylesheet">
    <link href='./inicio.css' rel='stylesheet'>
    <link href="./css/header.css" rel="stylesheet">
    <link href='./css/bootstrap.css' rel='stylesheet'>
    <link href='./css/boxicons-2.1.4/css/boxicons.css' rel='stylesheet'>


<body>

    <?php include('./header.php') ?>

    <h1 class="text-center  mt-4 border-bottom-4">INCIDENCIAS</h1>

    <form class="row g-3 container-sm mt-4 mx-auto px-4 py-3 shadow p-3 mb-5 bg-body-tertiary rounded form-registro" action="./config/ingreso_incidencia.php" method="POST">

        <div class="col-md-6">
            <label for="codigo">Codigo del equipos:</label>
            <datalist id="equipos">
                <?php
                while ($listaequipo = $resultadoequipo->fetch_assoc()) {
                    echo "<option value='" . $listaequipo['id_equipo'] . "'>";
                }
                ?>

            </datalist>
            <input type="text" id=codigo" name="codigo" list="equipos" required>
        </div>

        <div class="col-md-6">
            <label for="usuario">Cedula del usuario:</label>
            <datalist id="usuarios">
                <?php
                while ($listausuario = $resultadousuarios->fetch_assoc()) {
                    echo "<option value='" . $listausuario['id_usuario'] . "'>";
                }
                ?>

            </datalist>
            <input type="text" id="usuario" name="usuario" list="usuarios" required>
        </div>

        <label for="fecha_reporte">Fecha de reportaje:</label>
        <input type="date" id="fecha_reporte" name="fecha_reporte" value="<?php $d = strtotime("yesterday");
                                                                            echo date("Y-m-d", $d) ?>">


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
                <option value="No resuelta">No resuelta</option>
                <option value="Resuelta">Ya resuelta</option>

            </select>
        </div>


        <label for="observacion">Observación:</label>
        <textarea id="observacion" name="observacion"></textarea>


        <label for="fecha_solucion">Fecha prevista de solucion :</label>
        <input type="date" id="fecha_solucion" name="fecha_solucion" value="<?php echo date("Y-m-d") ?>">

        <div class="col-12 my-3 text-center">
            <button type="submit" class="btn btn-success fs-4 rounded-pill">Ingresar Incidencia</button>
        </div>
    </form>

    <section class="seccion">
        <div class="container-fluid">
            <?php
            $sql = "SELECT * FROM incidencias";
            $result = $conexion->query($sql);
            if ($result->num_rows > 0) {
            ?>
                <table id='tabla' class='pequiven-table'>
                    <thead>
                        <tr>
                           
                            <th scope='col'>Codigo del equipo</th>
                            <th scope='col'>Cedula del usuario</th>
                            <th scope='col'>Nombre del usuario</th>
                            <th scope='col'>Fecha de reportaje</th>
                            <th scope='col'>Prioridad</th>
                            <th scope='col'>Estado</th>
                            <th scope='col'>Observaciones</th>
                            <th scope='col'>Fecha prevista de solucion</th>
                            
                        </tr>
                    </thead>

                    <tbody class='table-group-divider'>
                        <?php
                        while ($row = $result->fetch_assoc()) {
                        ?>
                            <tr>
                                

                                <td><?php $sql1 = "SELECT * FROM equipos WHERE id_equipo = '". $row['id_equipo']."'";
                                    $resultado = $conexion->query($sql1);

                                    $row1 = $resultado->fetch_assoc();

                                    echo $row1['nombre']            ?></td>

                                <td><?php
                                    $sql2 = "SELECT * FROM usuarios WHERE id_usuario =" . $row['id_usuario'];
                                    $resultado2 = $conexion->query($sql2);

                                    $row2 = $resultado2->fetch_assoc();

                                    echo $row2['id_usuario'] ?></td>

                                <td><?php
                                    $sql2 = "SELECT * FROM usuarios WHERE id_usuario =" . $row['id_usuario'];
                                    $resultado2 = $conexion->query($sql2);

                                    $row2 = $resultado2->fetch_assoc();

                                    echo $row2['nombre'] ?></td>

                                <td><?php echo $row['fecha_reporte'] ?> </td>

                                <td><?php echo $row['prioridad'] ?> </td>


                                <td><?php echo $row['estado_solucion'] ?></td>

                                <td><?php echo $row['observacion'] ?></td>


                                <td><?php echo $row['fecha_solucion'] ?></td>
                              
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