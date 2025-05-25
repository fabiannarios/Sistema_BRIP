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

    <link rel="icon" href="./css/img/favicon.ico" sizes="any" />
    <link rel="stylesheet" href="./datatable/datatables1.css">
    <link href="./css/tabla.css" rel="stylesheet">
    <link href='./inicio.css' rel='stylesheet'>
    <link href="./css/header.css" rel="stylesheet">
    <link href='./css/bootstrap.css' rel='stylesheet'>
    <link href='./css/boxicons-2.1.4/css/boxicons.css' rel='stylesheet'>

</head>

<body>
    <?php include('./header.php') ?>

    <main class="main-content">
        <section class="container container-feactures">
            <div class="card-feature">
                <i class='bx bx-tachometer'></i>
                <div class="feature-content">
                    <span>Planta Amoniaco</span>
                    <p>Rendimiento</p>
                </div>
            </div>
            <div class="card-feature">
                <i class='bx bx-tachometer'></i>
                <div class="feature-content">
                    <span>Planta Urea</span>
                    <p>Rendimiento</p>
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
                    <span>Ver más</span>
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

        <section class="container top-products">
            <h1 class="heading-1">Tabla de Estado</h1>

            <div class="container-options">
                <span class="active">Equipo Disponible</span>
                <span class="active">Baja Confiabilidad</span>
                <span class="active">Equipo no Disponible</span>
            </div>

        </section>

        <section class="container my-5">
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

                                    <td><?php echo $row['estado_nuevo'] ?> </td>


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


        <footer class="footer">
            <div class="container container-footer">
                <div class="menu-footer">
                    <div class="contact-info">
                        <p class="title-footer">Información de contacto</p>
                        <ul>
                            <li>Dirección: Venezuela. edo Carabobo. Morón</li>
                            <li>Telefono: 412-123-1234</li>
                            <li>Fax: 123456789</li>
                            <li>Email: pequiven.com</li>
                        </ul>
                        <div class="social-icons">
                            <span class=facebook>
                                <i class='bx bxl-facebook-circle'></i>
                            </span>
                            <span class="x">
                                <i class='bx bx-x'></i>
                            </span>
                            <span class="tiktok">
                                <i class='bx bxl-tiktok'></i>
                            </span>
                            <span class="instagram">
                                <i class='bx bxl-instagram-alt'></i>
                            </span>
                            <span class="pinterest">
                                <i class='bx bxl-pinterest'></i>
                            </span>

                        </div>
                    </div>
                    <div class="information">
                        <p class="title-footer">Información</p>
                        <ul>
                            <li><a href="#">Acerca de Nosotros</a></li>
                            <li><a href="#">Politicas de Privacidad</a></li>
                            <li><a href="#">Terminos y Condiciones</a></li>
                            <li><a href="#">Contactános</a></li>
                        </ul>
                    </div>


                    <div class="newletter">
                        <p class="title-footer">Boletin informativo</p>
                        <div class="content">
                            <p>
                                en proceso
                            </p>
                            <a href="#"><button>en proceso?</button></a>
                        </div>
                    </div>
                </div>

                <div class="copyrigth">
                    <p>
                        Desarrollado por Fabianna Rios &copy; 2025
                    </p>
                    <img src="./css/img/image-removebg-preview.png" alt="">
                </div>
            </div>
        </footer>



    </main>


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