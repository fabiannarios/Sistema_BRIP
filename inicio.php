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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>

    <link rel="icon" href="favicon.ico" sizes="any" />
    <link rel="stylesheet" href="./datatable/datatables1.css">
    <link href="./css/tabla.css" rel="stylesheet">
    <link href='./css/inicio.css' rel='stylesheet'>
    <link href="./css/header.css" rel="stylesheet">
    <link href='./css/bootstrap.css' rel='stylesheet'>
    <link href='./css/boxicons/fonts/basic/boxicons.css' rel='stylesheet'>

</head>

<body>
    <?php include('./header.php') ?>

    <main class="main-content">
        <section class="container container-feactures">
            <div class="card-feature">
                <i class='bx bx-tachometer'></i>
                <div class="feature-content">
                    
                    <span>Planta Amoniaco</span>
                    <p class=" fs-4 mb-0">Rendimiento</p>
                    <p class=" fs-4"> <?php include('porcentaje.php') ?></p>
                </div>
            </div>
            <div class="card-feature">
                <i class='bx bx-tachometer'></i>
                <div class="feature-content">
                    <span>Planta Urea</span>
                    <p class=" mb-0">Rendimiento</p>
                    <p class=" fs-4"> <?php include('porcentajeurea.php') ?></p>
                </div>
            </div>
            <div class="card-feature">
                <i class='bx bx-tachometer'></i>
                <div class="feature-content">
                    <span>Planta Fertilizante</span>
                    <p>Rendimiento</p>
                </div>
            </div>
            <div class="card-feature">
                <i class='bx bx-tachometer'></i>
                <div class="feature-content">
                    <span>Planta servicio industriales 2</span>
                    <p>Rendimiento</p>
                </div>
            </div>
        </section>

        <section class="container top-categories">
            <h1 class="heading-1">Plantas en Nitrogenado</h1>
            <div class="container-categories">
                <div class="card-category category-amoniaco">
                    <p>Amoniaco</p>
                   <a class="link-offset-2 link-underline link-underline-opacity-0" href="amoniaco.php?id_planta=0"> <span>Ver más</span></a>
                </div>
                <div class="card-category category-urea">
                    <p>Urea</p>
                    <span>Ver más</span>
                </div>
                <div class="card-category category-fertilizantes">
                    <p>Fertilizantes</p>
                    <span>Ver más</span>
                </div>
                <div class="card-category category-servicios">
                    <p>Servicios industriales 2</p>
                    <span>Ver más</span>
                </div>



            </div>
        </section>

        <section class=" container-lg top-products">
            <h1 class="heading-1">Tablas de Estado</h1>
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header tabla-verde fs-1">
                        <button class="accordion-button collapsed  " type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            DISPONIBLES
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">

                            <?php
                            include("../Sistema_BRIP/config/conecxion_bd.php");


                            $sql = "SELECT * FROM equipos WHERE estado = 'verde'";
                            $result = $conexion->query($sql);
                            if ($result->num_rows > 0) {
                            ?>
                                <table id='tabla' class='pequiven-table'>
                                    <thead>
                                        <tr>
                                            <th scope='col'>Codigo</th>
                                            <th scope='col'>Nombre</th>
                                            <th scope='col'>Planta</th>
                                            <th scope='col'>Proceso</th>
                                            <th scope='col'>Observaciones</th>
                                            <th scope='col'>Estado</th>
                                            <th scope='col'>Fecha de la ultima revision</th>

                                        </tr>
                                    </thead>

                                    <tbody class='table-group-divider'>
                                        <?php
                                        while ($row = $result->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row['id_equipo'] ?> </td>
                                                <td><?php echo $row['nombre'] ?> </td>
                                                <td><?php $sql1 = "SELECT * FROM plantas WHERE id_planta =" . $row['id_planta'];
                                                    $resultado = $conexion->query($sql1);

                                                    $row1 = $resultado->fetch_assoc();

                                                    echo $row1['nombre_planta']            ?></td>
                                                <td><?php
                                                    $sql2 = "SELECT * FROM procesos WHERE id_proceso =" . $row['id_proceso'];
                                                    $resultado2 = $conexion->query($sql2);

                                                    $row2 = $resultado2->fetch_assoc();
                                                    echo $row2['nombre_proceso'] ?></td>
                                                <td><?php echo $row['observacion'] ?> </td>
                                                <td class="tabla-verde"><?php echo $row['estado'] ?> </td>
                                                <td><?php echo $row['ultima_revision'] ?> </td>
                                            </tr>
                                        <?php
                                        } ?>
                                    </tbody>

                                <?php
                            }

                                ?>
                                </table>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            EN PROCESO
                        </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <?php
                            include("../Sistema_BRIP/config/conecxion_bd.php");


                            $sql = "SELECT * FROM equipos WHERE estado = 'amarillo'";
                            $result = $conexion->query($sql);
                            if ($result->num_rows > 0) {
                            ?>
                                <table id='tabla2' class='pequiven-table'>
                                    <thead>
                                        <tr>
                                            <th scope='col'>Codigo</th>
                                            <th scope='col'>Nombre</th>
                                            <th scope='col'>Planta</th>
                                            <th scope='col'>Proceso</th>
                                            <th scope='col'>Observaciones</th>
                                            <th scope='col'>Estado</th>
                                            <th scope='col'>Fecha de la ultima revision</th>

                                        </tr>
                                    </thead>

                                    <tbody class='table-group-divider'>
                                        <?php
                                        while ($row = $result->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row['id_equipo'] ?> </td>
                                                <td><?php echo $row['nombre'] ?> </td>
                                                <td><?php $sql1 = "SELECT * FROM plantas WHERE id_planta =" . $row['id_planta'];
                                                    $resultado = $conexion->query($sql1);

                                                    $row1 = $resultado->fetch_assoc();

                                                    echo $row1['nombre_planta']            ?></td>
                                                <td><?php
                                                    $sql2 = "SELECT * FROM procesos WHERE id_proceso =" . $row['id_proceso'];
                                                    $resultado2 = $conexion->query($sql2);

                                                    $row2 = $resultado2->fetch_assoc();
                                                    echo $row2['nombre_proceso'] ?></td>
                                                <td><?php echo $row['observacion'] ?> </td>
                                                <td class="tabla-amarillo"><?php echo $row['estado'] ?> </td>
                                                <td><?php echo $row['ultima_revision'] ?> </td>
                                            </tr>
                                        <?php
                                        } ?>
                                    </tbody>

                                <?php
                            }

                                ?>
                                </table>

                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                            NO DISPONIBLE
                        </button>
                    </h2>
                    <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <?php
                            include("../Sistema_BRIP/config/conecxion_bd.php");


                            $sql = "SELECT * FROM equipos WHERE estado = 'rojo'";
                            $result = $conexion->query($sql);
                            if ($result->num_rows > 0) {
                            ?>
                                <table id='tabla3' class='pequiven-table'>
                                    <thead>
                                        <tr>
                                            <th scope='col'>Codigo</th>
                                            <th scope='col'>Nombre</th>
                                            <th scope='col'>Planta</th>
                                            <th scope='col'>Proceso</th>
                                            <th scope='col'>Observaciones</th>
                                            <th scope='col'>Estado</th>
                                            <th scope='col'>Fecha de la ultima revision</th>

                                        </tr>
                                    </thead>

                                    <tbody class='table-group-divider'>
                                        <?php
                                        while ($row = $result->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row['id_equipo'] ?> </td>
                                                <td><?php echo $row['nombre'] ?> </td>
                                                <td><?php $sql1 = "SELECT * FROM plantas WHERE id_planta =" . $row['id_planta'];
                                                    $resultado = $conexion->query($sql1);

                                                    $row1 = $resultado->fetch_assoc();

                                                    echo $row1['nombre_planta']            ?></td>
                                                <td><?php
                                                    $sql2 = "SELECT * FROM procesos WHERE id_proceso =" . $row['id_proceso'];
                                                    $resultado2 = $conexion->query($sql2);

                                                    $row2 = $resultado2->fetch_assoc();
                                                    echo $row2['nombre_proceso'] ?></td>
                                                <td><?php echo $row['observacion'] ?> </td>
                                                <td class="tabla-rojo"><?php echo $row['estado'] ?> </td>
                                                <td><?php echo $row['ultima_revision'] ?> </td>
                                            </tr>
                                        <?php
                                        } ?>
                                    </tbody>

                                <?php
                            }

                                ?>
                                </table>

                        </div>
                    </div>
                </div>
            </div>

        </section>

        <section class=" container-fluid my-5">
            <h1 class="heading-1">Historial de Mantenimiento</h1>


            <div class="container-fluid">
                <?php
                $sql = "SELECT * FROM mantenimiento";
                $result = $conexion->query($sql);
                if ($result->num_rows > 0) {
                ?>
                    <table id='tabla4' class='pequiven-table'>
                        <thead>
                            <tr>

                                <th scope='col'>Codigo del repuesto</th>
                                <th scope='col'>Nombre del equipo</th>

                                <th scope='col'>Codigo de la incidencia</th>
                                <th scope='col'>Estado anterior</th>
                                <th scope='col'>Estado nuevo</th>

                                <th scope='col'>Fecha del mantenimiento</th>

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





                                    <td><?php $sql3 = "SELECT * FROM incidencias WHERE id_incidencia='" . $row['id_incidencia'] . "'";
                                        $resultado3 = $conexion->query($sql3);

                                        $row3 = $resultado3->fetch_assoc();

                                        echo $row3['id_incidencia']            ?></td>

                                    <td><?php echo $row['estado_anterior'] ?> </td>

                                    <?php

                                    if ($row['estado_nuevo'] == 'ya resuelta') {

                                        echo "<td class = 'tabla-verde'> Ya resuelta </td>";
                                    } else if ($row['estado_nuevo'] == 'en proceso') {

                                        echo "<td class = 'tabla-amarillo'> En proceso </td>";
                                    } else {

                                        echo "<td class = 'tabla-rojo'> No resuelto </td>";
                                    }
                                    ?>



                                    <td><?php echo $row['fecha_mantenimiento'] ?></td>


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



    </main>

    <?php include_once('script.php') ?>


</body>

</html>