<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar componente</title>
    <link rel="icon" href="favicon.ico" sizes="any" />
    <link rel="stylesheet" href="./datatable/datatables1.css">
    <link href="../css/tabla.css" rel="stylesheet">
    <link href='../css/inicio.css' rel='stylesheet'>
    <link href="../css/header.css" rel="stylesheet">
    <link href='../css/bootstrap.css' rel='stylesheet'>
    <link href='../css/boxicons/fonts/basic/boxicons.css' rel='stylesheet'>

</head>

<body>
    <?php
    include_once('../config/conecxion_bd.php');
    include_once('./header.php');
    $sql = "SELECT * FROM usuarios WHERE id_usuario ='" . $_REQUEST['id_usuario']."'";

    $resultado = $conexion->query($sql);

    $row = $resultado->fetch_assoc();

    ?>

<h1 class="text-center display-1 bg-danger-subtle p-4 mb-5">Edición de Usuario</h1>

    <form class="row g-3 container-sm mt-4 mx-auto px-4 py-3 shadow p-3 mb-5 bg-body-tertiary rounded form-registro" action="../config/actualizarusuario.php" method="POST">

       
            <a href="./configuracion.php">
            <i class='bx bx-arrow-big-left-line fs-3'  style='color:#000000'></i>  
            </a>

           <div class="col-md-5">
            <label for="cedula">Cedula:</label>
            <input type="text" id="cedula" name="cedula" value="<?php echo $row['id_usuario'] ?> "  required>
        </div>


            <div class=" col-md-5">
            <label for="nombre">Nombre del Usuario:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo $row['nombre'] ?>" required>
            </div>

                    
        <div class="col-md-3">
                    <label for="telefono">Numero de telefono:</label>
                    <input type="text" id="telefono" name="telefono" value="<?php echo $row['telefono'] ?> "  required>
                    </div>


                     <div class="col-md-3">
                        <label for="departamento">Departamento del usuario:</label>
                <input class=" mx-2" type="text" placeholder="Departamento" name="departamento" value="<?php echo $row['departamento'] ?>" required>
            </div>

     <?php
        include("../config/conecxion_bd.php");
                $sql2 = "SELECT nombre_complejo FROM complejos_petroquimicos";
                $resultado2 = $conexion->query($sql2);

                $sql3 = "SELECT nombre_complejo FROM complejos_petroquimicos WHERE nombre_complejo ='". $row['nombre_complejo']."'";
                $resultado3 = $conexion->query($sql3);
                $complejo = $resultado3->fetch_assoc();
                 ?>
        <div class="col-md-4">
            <label for="complejo">Complejo:</label>
            <select class="form-select fs-4" id="complejo" name="complejo" required>
                <?php if (empty($complejo['nombre_complejo'])) {
                        echo "<option disabled selected >Seleccione una opcion</option>";
                }else {?>
                    <option value="<?php echo $complejo['nombre_complejo'] ?>" selected disabled><?php echo $complejo['nombre_complejo'] ?></option>
                <?php }?>
                
                <?php
                

                while ($fila = $resultado2->fetch_assoc()) {
                    echo "<option value='" . $fila['nombre_complejo'] . "'>" . $fila['nombre_complejo'] . "</option>";
                }
                   

                ?>

            </select>
            </div>
            <?php
            $sql4 = "SELECT id_planta, nombre_planta FROM plantas WHERE nombre_complejo='".$row['nombre_complejo'] ."'";
                $resultado4 = $conexion->query($sql4);
                $planta = $resultado4->fetch_assoc();
                 ?>

        <div class="col-md-4">
            <label for="planta">Planta:</label>
            <select class="form-select fs-4" id="planta" name="planta" required>
                <?php if (empty($planta['id_planta']) ) { 
                echo "<option disabled selected >Seleccione una opcion</option>";
                   }
                else {?>
                    <option value="<?php echo $planta['id_planta'] ?>" selected disabled ><?php echo $planta['nombre_planta'] ?></option>
               <?php }?>
            </select>
        </div>


                    <div class="mb-3">
                <label for="cargo" class="form-label"><b>Roles:</b></label>
                <select class="form-select fs-4" name="cargo" required>
                    <option value="" disabled selected><?php echo $row['cargo']; ?></option>
                    <option value="" disabled selected>Selecciona un rol</option>

                    <option value="trabajador">Trabajador</option>
                    <option value="administrador">Administrador</option>
                   
                    
                </select>
            </div>

           

        <div class="col-12 my-3 text-center">
            <button type="submit" class="btn btn-success fs-4 rounded-pill">Guardar Componente</button>



        <input type="hidden" id="id" name="id" value="<?php echo $row['id_usuario'] ?>" required>

    </form>

<script src="../js/peticionusuario.js"></script>
</body>

</html>