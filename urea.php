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
    <title>Urea</title>

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


    <h1 class="text-center display-1 bg-danger-subtle p-4 mb-5">Planta Urea</h1>

    <div class="container-fluid d-flex">

        <div class="container-fluid w-25 mx-0 align-content-center">
            <h1 class="text-center">Equipos en total</h1>
            <canvas id="myChart"></canvas>
        </div>
             <div class="container-fluid parent_urea">
            <div class="div1"> <h4 class="text-center text-uppercase">COMPRESION CO2</h4> <canvas id="myChart1"></canvas> </div>
            <div class="div2"> <h4 class="text-center text-uppercase">COMPRESION DE NITROGENO</h4> <canvas id="myChart2"></canvas> </div>
            <div class="div3"> <h4 class="text-center text-uppercase">BOMBEO DE AMONIACO (NH3) LIQUIDO</h4> <canvas id="myChart3"></canvas> </div>
            <div class="div4"> <h4 class="text-center text-uppercase">SECCION DE SINTESIS</h4> <canvas id="myChart4"> </div>
            <div class="div5"> <h4 class="text-center text-uppercase">SECCION DE RECUPERACION</h4> <canvas id="myChart5"> </div>
            <div class="div6"> <h4 class="text-center text-uppercase">SECCION DE PURIFICACION</h4> <canvas id="myChart6"> </div>
        </div> 

          

    </div>
        <div class=" d-flex container-fluid justify-content-center mt-5">
     <p class="d-inline-flex gap-1">
        <button class="btn btn-primary fs-2 border rounded-pill w-100" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Ver mas
        </button>
        </p>
        </div>

           <div class="collapse" id="collapseExample">
            <div class="card card-body">
            
            <div class="container-fluid parent_urea w-100">
            <div class="div7"> <h4 class="text-center text-uppercase">SECCION DE CONSENTRACION</h4> <canvas id="myChart7"> </div>
            <div class="div8"> <h4 class="text-center text-uppercase">TRATAMIENTO DE CONDENSADO DE PROCESO -PCT</h4> <canvas id="myChart8"> </div>
            <div class="div9"> <h4 class="text-center text-uppercase">SECCION DE GRANULACION</h4> <canvas id="myChart9"> </div>
            <div class="div10"> <h4 class="text-center text-uppercase"> RECICLO GRANULADOS </h4> <canvas id="myChart10"> </div>
            <div class="div11"> <h4 class="text-center text-uppercase"> RECUPERACION DE POLVOS </h4> <canvas id="myChart11"> </div>    
            </div>

            </div>
            </div>  


    <div class="container-fluid mt-5 ">
                <div class="container-fluid  text-center ">
                 <a class="d-inline-flex focus-ring  px-2 text-decoration-none border rounded-pill fs-2 bg-danger text-white p-3" href="export_pdf.php?id_planta=1">Descargar tabla en PDF</a>

                <a class="d-inline-flex focus-ring px-2 text-decoration-none border rounded-pill fs-2 bg-success text-white ms-5 p-3" href="exprt_excel.php?id_planta=1">Descargar tabla en EXCEL</a>
                </div>
        <?php

        $sql = "SELECT * FROM equipos WHERE id_planta = 1 ";
        $result = $conexion->query($sql);
        if ($result->num_rows > 0) {
        ?>
            <table id='tabla' class='pequiven-table'>
                <thead>
                    <tr>
                        <th scope='col'>TAG</th>
                        <th scope='col'>Nombre</th>
                        <th scope='col'>Planta</th>
                        <th scope='col'>Proceso</th>
                        <th scope='col'>Observaciones</th>
                        <th scope='col'>Estado</th>
                        <th scope='col'>Fecha de la ultima revision</th>
                        <th scope='col'></th>
                    </tr>
                </thead>



                <tbody class='table-group-divider'>
                    <?php
                    while ($row = $result->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?php echo $row['id_equipo'] ?> </td>
                            <td><?php echo $row['nombre'] ?></td>
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


                            <?php

                            if ($row['estado'] == 'verde') {
                                echo "<td class = 'tabla-verde'> Disponible </td>";
                            } else if ($row['estado'] == 'amarillo') {
                                echo "<td class = 'tabla-amarillo'> Baja confiabilidad </td>";
                            } else {
                                echo "<td class = 'tabla-rojo'> No disponible </td>";
                            }
                            ?>


                            <td><?php echo $row['ultima_revision'] ?></td>


                            <td>
                                <a href="editarequipo.php?id_equipo=<?php echo $row['id_equipo'] ?>" class="btn btn-warning fs-5 text-white link-underline link-underline-opacity-0"> EDITAR</a>
                                <a href="./config/eliminarequipo.php?id_equipo=<?php echo $row['id_equipo'] ?>" class="btn btn-danger fs-5 text-white link-underline link-underline-opacity-0"> ELIMINAR</a>
                            </td>
                        </tr>
                    <?php
                    } ?>
                </tbody>

            <?php
        }
        
            ?>

            <?php include('script.php') ?>
            </table>



    </div>



<script src="./js/scriptchart_urea.js"></script>
<script src="./node_modules/chart.js/dist/chart.umd.js"></script>


</body>




</html>