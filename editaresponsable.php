<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar componente</title>
    <link rel="icon" href="favicon.ico" sizes="any" />
    <link rel="stylesheet" href="./datatable/datatables1.css">
    <link href="./css/tabla.css" rel="stylesheet">
    <link href='./css/inicio.css' rel='stylesheet'>
    <link href="./css/header.css" rel="stylesheet">
    <link href='./css/bootstrap.css' rel='stylesheet'>
    <link href='./css/boxicons/fonts/basic/boxicons.css' rel='stylesheet'>

</head>

<body>
    <?php
    include_once('./config/conecxion_bd.php');
    include_once('./header.php');
    $sql = "SELECT * FROM responsables WHERE id_responsable ='" . $_REQUEST['id_responsable']."'";

    $resultado = $conexion->query($sql);

    $row = $resultado->fetch_assoc();

    ?>

<h1 class="text-center display-1 bg-danger-subtle p-4 mb-5">Edicion de Usuario</h1>

    <form class="row g-3 container-sm mt-4 mx-auto px-4 py-3 shadow p-3 mb-5 bg-body-tertiary rounded form-registro" action="./config/actualizaresponsable.php" method="POST">

       
            <a class="d-block w-auto me-5" href="./configuracion.php">
            <i class='bx bx-arrow-big-left-line fs-3'  style='color:#000000'></i>  
            </a>

           <div class="col-md-5">
            <label for="cedula">Cedula del responsable:</label>
            <input type="text" id="cedula" name="cedula" value="<?php echo $row['id_responsable'] ?> "  required>
        </div>


            <div class=" col-md-5">
            <label for="nombre">Nombre del responsable:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo $row['nombre'] ?>" required>
            </div>

                    
        <div class="col-md-6">
                    <label for="departamento">Departamento:</label>
                    <input type="text" id="departamento" name="departamento" value="<?php echo $row['departamento'] ?> "  required>
                    </div>

                    
           

        <div class="col-12 mt-5 text-center">
            <button type="submit" class="btn btn-success fs-4 rounded-pill">Guardar Componente</button>



        <input type="hidden" id="id" name="id" value="<?php echo $row['id_responsable'] ?>" required>

    </form>


</body>

</html>