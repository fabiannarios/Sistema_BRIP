



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link href='../css/bootstrap.css' rel='stylesheet'>
    <link href='../css/boxicons-2.1.4/css/boxicons.css' rel='stylesheet'>
</head>

<body>
    <div class="wrapper"> 
        <form method="GET" action="../config/ingresar_sistema.php">
            <h1 class="text-dark">Bienvenido</h1>

            <div class="input-box">
                <input type="text" placeholder="cedula" name="id_usuario" required>
                <i class='bx bx-user-circle'></i>
            </div>

            <div class="input-box">
                <input type="password" placeholder="nombre" name="nombre" required>
                <i class='bx bx-lock-alt'></i>
            </div>
            <br> 
            <div class="container mx-md-2">
            <button type="submit" class="btn btn-primary btn-lg mx-md-3" name="iniciar" value="Ingresar" >Iniciar</button>
            </div>
            <br>

           

            <div class="register-link">
                <p>No tienes cuenta? <a class="" href="../views/signup.php">Registrar</a></p>
            </div>

        </form>
    </div>

</body>


</html>