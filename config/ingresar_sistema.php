<?php
include("conecxion_bd.php");
session_start();



if (isset($_GET["iniciar"])) {

    $cedula = $_GET["id_usuario"];
    $nombre = $_GET["nombre"];
    $fechainicio = $_GET["fecha_inicio"];



    // $sql="SELECT * FROM USUARIO WHERE usuario='$id_usuario' AND contraseña='$nombre' AND rol=1";
    $sql = "SELECT * FROM usuarios where id_usuario = '$cedula' AND nombre= '$nombre'"; //Sirve para guardar la informacion de la consulta de la tabla (usuario) y se almacena en la variable $sql
    $resultado = mysqli_query($conexion, $sql);
    $numero_registro = mysqli_num_rows($resultado);

    $sql2 = "SELECT id_usuario, COUNT(id_usuario) AS frecuencia from sesiones where id_usuario = '$cedula'";
    $resultado2 = mysqli_query($conexion, $sql2);
    $fila2 = mysqli_fetch_assoc($resultado2);


    $sql3 = "SELECT * FROM usuarios WHERE nombre = '$nombre'";
    $resultado3 = mysqli_query($conexion, $sql3);
    $fila3 = mysqli_fetch_assoc($resultado3);

    if ($numero_registro != 0) {

        while (($fila = mysqli_fetch_assoc($resultado)) == true) {

            if ($fila['activo'] == 1) {
                
            if ($fila["cargo"] == "administrador") {

                if ($fila2['frecuencia'] == 0) {
                    $sql1 = "INSERT INTO sesiones (id_usuario, fecha_inicio, fecha_fin) 
                    VALUES ('$cedula', '$fechainicio', '$fechainicio')";


                    $conexion->query($sql1);
                } else {

                    $sql1 = "UPDATE sesiones
                             SET fecha_inicio = '" . $fechainicio . "'
                             WHERE id_usuario = '" . $cedula . "'";
                    $conexion->query($sql1);
                }

                $_SESSION['rol'] = $fila["cargo"];
                $_SESSION['usuario'] = $fila3["nombre"];

                 echo "<script type='text/javascript'>";
            echo "alert('Usuario ingresado con exito');";
            echo "window.location.href = '../views/inicio.php';";
            echo "</script>";
            
            } elseif ($fila["cargo"] == "trabajador") {

                if ($fila2['frecuencia'] == 0) {
                    $sql1 = "INSERT INTO sesiones (id_usuario, fecha_inicio, fecha_fin) 
                    VALUES ('$cedula', '$fechainicio', '$fechainicio')";
                    $conexion->query($sql1);
                } else {

                    $sql1 = "UPDATE sesiones
                             SET fecha_inicio = '" . $fechainicio . "'
                             WHERE id_usuario = '" . $cedula . "'";
                    $conexion->query($sql1);
                }
                $_SESSION['rol'] = $fila["cargo"];
                $_SESSION['usuario'] = $fila3["nombre"];

                 echo "<script type='text/javascript'>";
            echo "alert('Usuario ingresado con exito');";
            echo "window.location.href = '../views/inicio.php';";
            echo "</script>";
            }

            } else{
                echo "<script type='text/javascript'>";
                echo "alert('Usuario inhabilitado');";
                echo "window.location.href = '../views/login.php';";
                echo "</script>";
            }
        }
    } else {

            echo "<script type='text/javascript'>";
            echo "alert('Usuario no reconocido');";
            echo "window.location.href = '../views/login.php';";
            echo "</script>";
    }
}
