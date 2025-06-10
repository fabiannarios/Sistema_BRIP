<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuracion</title>

      <link rel="icon" href="favicon.ico" sizes="any" />
    <link rel="stylesheet" href="./datatable/datatables1.css">
    <link href="./css/tabla.css" rel="stylesheet">
    <link href='./css/inicio.css' rel='stylesheet'>
    <link href="./css/header.css" rel="stylesheet">
    <link href='./css/bootstrap.css' rel='stylesheet'>
    <link href='./css/boxicons/fonts/basic/boxicons.css' rel='stylesheet'>


</head>
<body>

<?php include('header.php') ?>

<h1 class="text-center display-1 bg-danger-subtle p-4 mb-5">Configuracion de Usuarios</h1>


<div class="container-fluid">
            <?php
            include("../Sistema_BRIP/config/conecxion_bd.php");
                ob_start();

            $sql = "SELECT * FROM usuarios";
            $result = $conexion->query($sql);
            if ($result->num_rows > 0) {
                ?>
                <table id='tabla' class='pequiven-table'>
                    <thead>
                    <tr>
                    <th scope='col text-center'>TAG</th>
                    <th scope='col text-center'>Nombre</th>
                    <th scope='col text-center'>Planta</th>
                    <th scope='col text-center'>Proceso</th>
                    <th scope='col text-center'>Observaciones</th>
                    <th scope='col text-center'>Estado</th>
                    <th></th>
                    </tr>
                </thead>



                <tbody class='table-group-divider'>
                <?php
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                    <td class=" text-center"><?php echo $row['id_usuario'] ?> </td>
                        <td class=" text-center"><?php echo $row['nombre']?></td>
                       
                        <td class=" text-center"><?php
                        $sql2 = "SELECT * FROM roles WHERE id_rol =". $row['id_rol'];
                        $resultado2 = $conexion->query($sql2);

                        $row2 = $resultado2->fetch_assoc();
                        echo $row2['nombre']?></td>

                        <td class=" text-center"><?php echo $row['telefono']?> </td>

                        <td class=" text-center"><?php echo $row['fecha_creacion']?></td>

                        
                        <?php 

                        if ($row['activo'] == 1 ) {
                            echo "<td class = 'tabla-verde text-center'> Habilitado </td>";  
                        } else {
                            echo "<td class = 'tabla-rojo text-center'> Inhabilitado </td>";
                        }
                        ?>

                        <td> 
                         
                            <a href="editarusuario.php?id_usuario=<?php echo $row['id_usuario'] ?>" class="btn btn-warning fs-5 text-white link-underline link-underline-opacity-0"> EDITAR</a>
                            <a href="./config/eliminarusuario.php?id_equipo=<?php echo $row['id_usuario'] ?>" class="btn btn-danger fs-5 text-white link-underline link-underline-opacity-0"> ELIMINAR</a>
                        </td>
                        </tr>
                  <?php      
                }?>

                         

                    
                
            <?php    
            }
            $conexion->close();
            ?>
            </table>

           
</div>
               
      


        <script src="./js/peticiones.js"></script>
        <script src="./jquery/jquery.js"></script>
        <script src="./datatable/datatables1.js"></script>
        <script>
            $(document).ready(function() {
                $('#tabla').DataTable({
                    lengthMenu: [5, 10, 25, 50, 100],
                    pageLength: 25,
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