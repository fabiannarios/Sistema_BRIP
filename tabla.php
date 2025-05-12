<!--formulario-->

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
    <link href='./inicio.css' rel='stylesheet'>
    <link href="./css/header.css" rel="stylesheet">
    <link href='./css/bootstrap.css' rel='stylesheet'>
    <link href='./css/boxicons-2.1.4/css/boxicons.css' rel='stylesheet'>

</head>

<body>
    <?php include('./header.php') ?>
    <h1 class="text-center  mt-4">Registro de Componentes</h2>
        <form class="row g-3 container-sm mt-4 mx-auto px-4 py-3 shadow p-3 mb-5 bg-body-tertiary rounded form-registro" action="./config/procesar.php" method="POST">

            <div class="col-md-6">
                <label for="codigo">Código:</label>
                <input type="text" id="codigo" name="codigo" required>
            </div>

            <div class="col-md-6">
                <label for="nombre">Nombre del Componente:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>

            <div class="col-md-4">
                <label for="proceso">Proceso:</label>
                <select class="form-select fs-4" id="proceso" name="proceso">
                    <option value="1">HIDRO DESULFURACION</option>
                    <option value="2">REFORMACION PRIMARIA</option>
                    <option value="3">REFORMACION SECUNDARIA</option>
                    <option value="4">CONVERSION DE ALTA Y BAJA TEMPERATURA</option>
                    <option value="5">REMOCION DE CO2</option>
                    <option value="6">METANACION</option>
                    <option value="7">COMPRESION Y SINTESIS</option>
                    <option value="8">SISTEMA DE REFRIGERACION DE AMONIACO (NH3)</option>
                </select>

            </div>
            <label for="observacion">Observación:</label>
            <textarea id="observacion" name="observacion"></textarea>

            <div class="col-md-4">
                <label for="estado">Estado:</label>
                <select class="form-select fs-4" id="estado" name="estado">
                    <option value="verde">Disponible</option>
                    <option value="amarillo">Baja Confiabilidad</option>
                    <option value="rojo">No Disponible</option>
                </select>
            </div>
            <label for="fecha_revision">Última Revisión:</label>
            <input type="date" id="fecha_revision" name="fecha_revision">

            <div class="col-12">
                <button type="submit" class="btn btn-success fs-4">Guardar Componente</button>
            </div>
        </form>

        <section>

            <?php
            include("../Sistema_BRIP/config/conecxion_bd.php");
            if ($conexion->connect_error) {
                die("Falló la conexión a la base de datos: " . $conexion->connect_error);
            }
            $sql = "SELECT * FROM equipos";
            $result = $conexion->query($sql);
            if ($result->num_rows > 0) {
                echo "<table id='tabla' class='pequiven-table'>
                    <thead>
                    <tr>
                    <th scope='col'>Codigo</th>
                    <th scope='col'>Nombre</th>
                    <th scope='col'>Proceso</th>
                    <th scope='col'>Observaciones</th>
                    <th scope='col'>Estado</th>
                    <th scope='col'>Fecha de la ultima revision</th>
                    </tr>
                </thead>

                <tbody class='table-group-divider'>";

                while ($row = $result->fetch_assoc()) {

                    echo

                    "<tr>
                    <td>" . $row['id_equipo'] . "</td>" .
                        "<td>" . $row['nombre'] . "</td>" .
                        "<td>" . $row['id_proceso'] . "</td>" .
                        "<td>" . $row['observacion'] . "</td>" .
                        "<td>" . $row['estado'] . "</td>" .
                        "<td>" . $row['ultima_revision'] . "</td>" .
                        "
                        </tr>";
                        
                }
                      echo  "</tbody>";
                echo "</table>";
            }
            $conexion->close();
            ?>


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