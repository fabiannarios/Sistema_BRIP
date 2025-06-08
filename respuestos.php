<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Repuesto</title>
</head>

<body>
    <!--formulario-->

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Repuestos</title>
        <link rel="icon" type="image/x-icon" href="favicon.ico">
        <link rel="stylesheet" href="./datatable/datatables1.css">
        <link href="./css/tabla.css" rel="stylesheet">
        <link href='./css/inicio.css' rel='stylesheet'>
        <link href="./css/header.css" rel="stylesheet">
        <link href='./css/bootstrap.css' rel='stylesheet'>
        <link rel="icon" href="favicon.ico" sizes="any" />
        <link href='./css/boxicons/fonts/basic/boxicons.css' rel='stylesheet'>

    </head>

    <body>
        <?php include('./header.php') ?>
        <h1 class="text-center  mt-4 border-bottom-4">Repuestos</h1>



        <form class="row g-3 container-sm mt-4 mx-auto px-4 py-3 shadow p-3 mb-5 bg-body-tertiary rounded form-registro" action="./config/ingreso_respuestos.php" method="POST">

            <div class="col-md-6">
                <label for="codigo">TAG:</label>
                <input type="text" id="codigo" name="codigo" required>
            </div>

            <div class="col-md-6">
                <label for="nombre">Nombre del equipo:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>



            <div class="col-md-6">
                <label for="costo">Costo del equipo:</label>
                <input type="text" id="costo" name="costo" required>
            </div>

            <div class="col-md-6">
                <label for="cantidad">Cantidad:</label>
                <input type="text" id="cantidad" name="cantidad" required>
            </div>

            <div class="col-md-4">
                <label for="estado">Estado:</label>
                <select class="form-select fs-4" id="estado" name="estado">
                    <option value="recibido">Recibido</option>
                    <option value="solicitado">Solicitado</option>
                    <option value="en_transito">En transito</option>
                </select>
            </div>

            <label for="fecha_solicitud">Fecha de solicitud:</label>
            <input type="date" id="fecha_solicitud" name="fecha_solicitud" value="<?php $d = strtotime("yesterday");
                                                                                    echo date("Y-m-d", $d) ?>">

            <label for="fecha_recepcion">Fecha de recepcion:</label>
            <input type="date" id="fecha_recepcion" name="fecha_recepcion" value="<?php $d = strtotime("yesterday");
                                                                                    echo date("Y-m-d", $d) ?>">




            <div class="col-12 my-3 text-center">
                <button type="submit" class="btn btn-success fs-4 rounded-pill">Guardar Componente</button>
            </div>
        </form>

        <section>
            <div class="container-fluid">
                <?php
                include("../Sistema_BRIP/config/conecxion_bd.php");


                $sql = "SELECT * FROM repuesto";
                $result = $conexion->query($sql);
                if ($result->num_rows > 0) {
                ?>
                    <table id='tabla' class='pequiven-table'>
                        <thead>
                            <tr>
                                <th scope='col'>TAG</th>
                                <th scope='col'>Nombre</th>
                                <th scope='col'>Estado</th>
                                <th scope='col'>Costo</th>
                                <th scope='col'>Fecha de solicitud</th>
                                <th scope='col'>Fecha de recepcion</th>
                                <th scope='col'>Cantidad</th>
                                
                            </tr>
                        </thead>

                        <tbody class='table-group-divider'>
                            <?php
                            while ($row = $result->fetch_assoc()) {
                            ?>
                                <tr>
                                    <td><?php echo $row['id_repuesto'] ?> </td>
                                    <td><?php echo $row['nombre'] ?></td>
                                    <?php

                                    if ($row['estado'] == 'recibido') {
                                        echo "<td class = 'tabla-verde'> Recibido </td>";
                                    } else if ($row['estado'] == 'en_transito') {
                                        echo "<td class = 'tabla-amarillo'> Baja confiabilidad </td>";
                                    } else {
                                        echo "<td class = 'tabla-rojo'> No disponible </td>";
                                    }
                                    ?>
                                    <td><?php echo $row['costo'] ?> </td>

                                    <td><?php echo $row['fecha_solicitud'] ?></td>
                                    <td><?php echo $row['fecha_recepcion'] ?></td>
                                    <td><?php echo $row['cantidad'] ?></td>


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