<!--formulario-->

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipos</title>
    
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
    <h1 class="text-center  mt-4 border-bottom-4">EQUIPOS</h1>



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
            <label for="planta">Planta:</label>
            <select class="form-select fs-4" id="planta" name="planta">
                <option value="">Seleccionar</option>

                <?php
                 include("../Sistema_BRIP/config/conecxion_bd.php");

                $sql2 = "SELECT id_planta, nombre_planta FROM plantas";
                $resultado2 = $conexion->query($sql2);
                while ($fila = $resultado2->fetch_assoc()) {
                    echo "<option value='" . $fila['id_planta'] . "'>" . $fila['nombre_planta'] . "</option>";
                }
                   

                ?>

            </select>
            </div>

            <div class="col-md-4">
                <label for="proceso">Proceso:</label>
                <select class="form-select fs-4" id="proceso" name="proceso">
                <option value="">Seleccionar</option>

                
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
            <input type="date" id="fecha_revision" name="fecha_revision" value="<?php $d=strtotime("yesterday"); echo date("Y-m-d", $d) ?>">

            <div class="col-12 my-3 text-center">
                <button type="submit" class="btn btn-success fs-4 rounded-pill">Guardar Componente</button>
            </div>
        </form>

        <section >
        <div class="container-fluid">
            <?php
            include("../Sistema_BRIP/config/conecxion_bd.php");
       

            $sql = "SELECT * FROM equipos";
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
                    <th scope='col'></th>
                    </tr>
                </thead>

                <tbody class='table-group-divider'>
                <?php
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                    <td><?php echo $row['id_equipo'] ?> </td>
                        <td><?php echo $row['nombre']?></td>
                        <td><?php   $sql1 = "SELECT * FROM plantas WHERE id_planta =". $row['id_planta'];          
                            $resultado = $conexion->query($sql1);

                            $row1 = $resultado->fetch_assoc();
                        
                            echo $row1['nombre_planta']            ?></td>  
                        <td><?php
                        $sql2 = "SELECT * FROM procesos WHERE id_proceso =". $row['id_proceso'];
                        $resultado2 = $conexion->query($sql2);

                        $row2 = $resultado2->fetch_assoc();
                        echo $row2['nombre_proceso']?></td>
                        <td><?php echo $row['observacion']?> </td>
                        <td><?php echo $row['estado']?></td>
                        <td><?php echo $row['ultima_revision']?></td>
                        <td> 
                            <a href="editarequipo.php?id_equipo=<?php echo $row['id_equipo'] ?>" class="btn btn-warning fs-5 text-white link-underline link-underline-opacity-0"> EDITAR</a>
                            <a href="./config/eliminarequipo.php?id_equipo=<?php echo $row['id_equipo'] ?>" class="btn btn-danger fs-5 text-white link-underline link-underline-opacity-0"> ELIMINAR</a>
                        </td>
                        </tr>
                  <?php      
                }?>
                     </tbody>
                
            <?php    
            }
            $conexion->close();
            ?>
            </table>
</div>

        </section>


        <script src="./js/peticiones.js"></script>
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