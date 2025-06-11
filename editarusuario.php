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
    $sql = "SELECT * FROM usuarios WHERE id_usuario ='" . $_REQUEST['id_usuario']."'";

    $resultado = $conexion->query($sql);

    $row = $resultado->fetch_assoc();

    ?>

<h1 class="text-center display-1 bg-danger-subtle p-4 mb-5">Edicion de Usuario</h1>

    <form class="row g-3 container-sm mt-4 mx-auto px-4 py-3 shadow p-3 mb-5 bg-body-tertiary rounded form-registro" action="./config/actualizarusuario.php" method="POST">

       
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

                    
        <div class="col-md-6">
                    <label for="telefono">Telefono:</label>
                    <input type="text" id="telefono" name="telefono" value="<?php echo $row['telefono'] ?> "  required>
                    </div>

                    <div class="mb-3">
                <label for="id_rol" class="form-label"><b>Roles:</b></label>
                <select class="form-select fs-4" name="id_rol" required>
                    <option value="" disabled selected>Selecciona un rol</option>
                    <?php
                    include "../config/conecxion_bd.php";
                    if ($conexion->connect_error) {
                        die("Falló la conexión a la base de datos: " . $conexion->connect_error);
                    }
                    $sql1 = "SELECT * FROM roles";
                    $result = $conexion->query($sql1);
                    if ($result->num_rows > 0) {
                        while ($row1 = $result->fetch_assoc()) {
                            echo "<option value='" . $row1['id_rol'] . "'>" . $row1['nombre'] . "</option>";
                        }
                    }
                    $conexion->close();
                    ?>
                </select>
            </div>

           

        <div class="col-12 my-3 text-center">
            <button type="submit" class="btn btn-success fs-4 rounded-pill">Guardar Componente</button>



        <input type="hidden" id="id" name="id" value="<?php echo $row['id_usuario'] ?>" required>

    </form>


</body>

</html>