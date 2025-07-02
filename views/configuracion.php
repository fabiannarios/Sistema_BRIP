<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuracion</title>

      <link rel="icon" href="favicon.ico" sizes="any" />
    <link rel="stylesheet" href="../datatable/datatables1.css">
    <link href="../css/tabla.css" rel="stylesheet">
    <link href='../css/inicio.css' rel='stylesheet'>
    <link href="../css/header.css" rel="stylesheet">
    <link href='../css/bootstrap.css' rel='stylesheet'>
    <link href='../css/boxicons/fonts/basic/boxicons.css' rel='stylesheet'>


</head>
<body>

<?php include('header.php') ?>

<h1 class="text-center display-1 bg-danger-subtle p-4 mb-5">Configuracion de Usuarios</h1>


<div class="container-fluid">
            <?php
            include("../config/conecxion_bd.php");
                ob_start();

            $sql = "SELECT * FROM usuarios";
            $result = $conexion->query($sql);
            if ($result->num_rows > 0) {
                ?>
                <table id='tabla' class='pequiven-table'>
                    <thead>
                    <tr>
                    <th scope='col text-center'>Cedula</th>
                    <th scope='col text-center'>Nombre</th>
                    <th scope='col text-center'>Cargo</th>
                    <th scope='col text-center'>Departamento</th>
                    <th scope='col text-center'>Telefono</th>
                    <th scope='col text-center'>Planta</th>
                    <th scope='col text-center'>Complejo</th>
                    <th scope='col text-center'>Fecha de creacion</th>
                    <th scope='col text-center'>Habilitado/Deshabilitado</th>
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
                       
                        <td class=" text-center text-uppercase"><?php echo $row['cargo']?></td>

                        <td class=" text-center text-uppercase"><?php echo $row['departamento']?></td>
                

                        <td class=" text-center"><?php echo $row['telefono']?> </td>

                        <td class=" text-center"><?php  
                        
                        $sql3 = "SELECT * FROM complejos_petroquimicos WHERE nombre_complejo ='". $row['nombre_complejo'] ."'";
                        $resultado3 = $conexion->query($sql3);

                        $row3 = $resultado3->fetch_assoc();
                        $sql2 = "SELECT * FROM plantas WHERE id_planta ='". $row['id_planta'] ."'";
                        $resultado2 = $conexion->query($sql2);

                        $row2 = $resultado2->fetch_assoc();
                        if (empty($row3['nombre_complejo'])) {
                            echo 'No asignado';
                        }else {
                            echo $row2['nombre_planta'];
                        }
                         ?>
                        
                    </td>

                        <td class=" text-center"><?php
                      

                        if (empty($row3['nombre_complejo'])) {
                           echo 'No asignado';
                        }else {
                            echo $row3['nombre_complejo'];
                        }?>
                         </td>

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
                            <a href="../config/eliminarusuario.php?id_usuario=<?php echo $row['id_usuario'] ?>" class="btn btn-danger fs-5 text-white link-underline link-underline-opacity-0"> ELIMINAR</a>
                            <a href="../config/habilitarusuario.php?id_usuario=<?php echo $row['id_usuario'] ?>" class="btn btn-danger fs-5 text-white link-underline link-underline-opacity-0 p-2"> DESHABILITAR/HABILITAR</a>

                        </td>
                        </tr>
                  <?php      
                }?>

                         

                    
                
            <?php    
            }
         
            ?>
            </table>

             
      


        <?php include_once('./script.php')?>
           
</body>
</html>