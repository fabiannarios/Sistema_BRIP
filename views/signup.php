<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrate</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link href='../css/bootstrap.css' rel='stylesheet'>
    <link href='../css/boxicons-2.1.4/css/boxicons.css' rel='stylesheet'>
</head>

<body>
    <div class="wrapper"> 
        <form method="POST" action="../config/conexion_registro.php">
            <h1>Registrate</h1>
            <div class="input-box">
                <input type="text" placeholder="id_usuario" name="id_usuario" required>
            </div>

            <div class="input-box">
                <input type="text" placeholder="nombre" name="nombre" required>
            </div>
           
            <div class="mb-3">
                <label for="id_rol" class="form-label"><b>Roles:</b></label>
                <select class="form-select" name="id_rol" required >
                    <option value="" disabled selected>Selecciona un rol</option>
                    <?php
                    include "../config/conecxion_bd.php";
                    if ($conexion->connect_error) {
                        die("Falló la conexión a la base de datos: " . $conexion->connect_error);
                    }
                    $sql = "SELECT * FROM roles";
                    $result = $conexion->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['id_rol'] . "'>" . $row['nombre'] . "</option>";
                        }
                    }
                    $conexion->close();
                    ?>
                </select>
			</div>

            <div class="input-box">
                <input type="text" placeholder="telefono" name="telefono" required>
            </div>

            <div class="input-box">
                <input type="datetime-local" placeholder="fecha" name="fecha_creacion" required>
            </div>

            <br>
            <br>


            

            <button type="submit" name="registrar" class="button">Registrar</button>
        </form>

            <div class="register-link">
                <p>Ya tengo una cuenta <a href="../views/login.php">Inicio</a></p>
            </div>

    </div>

</body>
</html>