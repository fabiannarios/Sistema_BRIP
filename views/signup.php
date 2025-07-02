<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrate</title>
    <link rel="icon" href="../../css/img/favicon.ico" sizes="any" />
    <link rel="stylesheet" href="../css/styles.css">
    <link href='../css/bootstrap.css' rel='stylesheet'>
    <link href='../css/boxicons/fonts/basic/boxicons.css' rel='stylesheet'>
    
</head>

<body>
    

    <div class="wrapper">
        <form method="POST" action="../config/conexion_registro.php">
            <a href="inicio.php">
            <i class='bx bx-arrow-big-left-line fs-3'  style='color:#000000'></i>  
            </a>
            <h1>Registrate</h1>
            <div class="input-box">
                <input class="bg-body-secondary" type="text " placeholder="Cedula" name="id_usuario" required>
            </div>

            <div class="input-box">
                <input class="bg-body-secondary" type="text" placeholder="Nombre" name="nombre" required>
            
            </div>

            <div class="mb-3">
                <label for="id_rol" class="form-label"><b>Roles:</b></label>
                <select class="form-select" name="id_rol" required>
                    <option value="" disabled selected>Selecciona un rol</option>
                    <option value="trabajador">Trabajador</option>
                    <option value="administrador">Administrador</option>
                   
                </select>
            </div>

             <div class="input-box">
                <input class="bg-body-secondary" type="text" placeholder="Departamento" name="departamento" required>
            </div>

            <div class="input-box">
                <input class="bg-body-secondary" type="text" placeholder="telefono" name="telefono" required>
            </div>

            <div class="mb-3">
            <label for="complejo">Complejo:</label>
            <select class="form-select" id="complejo" name="complejo" required>
                <option value="">Seleccionar</option>

                <?php
                 include_once("../config/conecxion_bd.php");

                $sql2 = "SELECT nombre_complejo FROM complejos_petroquimicos";
                $resultado2 = $conexion->query($sql2);
                while ($fila = $resultado2->fetch_assoc()) {
                    echo "<option value='" . $fila['nombre_complejo'] . "'>" . $fila['nombre_complejo'] . "</option>";
                }
                   

                ?>

            </select>
            </div>

            <div class="mb-3">
                <label for="planta">Planta:</label>
                <select class="form-select" id="planta" name="planta" required>
                <option value="">Seleccionar</option>

                
                </select>

            </div>

           
                <input hidden type="datetime-local" placeholder="fecha" name="fecha_creacion" 
                <?php
                date_default_timezone_set("America/Caracas");
                    $now = new DateTime();
                
                    echo "value='". $now->format('Y-m-d') ."T". $now->format('H:i')."'"
                ?>" required>
          





            <button type="submit" name="registrar" class="button">Registrar</button>
        </form>

    </div>

    <script src="../js/peticionplanta.js"></script>

</body>

</html>