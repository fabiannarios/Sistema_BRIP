<?php
include("conecxion_bd.php");
session_start();



if (isset($_GET["iniciar"])) {

    $cedula = $_GET["id_usuario"];
    $nombre = $_GET["nombre"];
    $fechainicio = $_GET["fecha_inicio"];



    // $sql="SELECT * FROM USUARIO WHERE usuario='$id_usuario' AND contraseña='$nombre' AND rol=1";
    $sql = "SELECT * FROM usuarios, roles where usuarios.id_usuario = '$cedula' AND usuarios.nombre= '$nombre' AND usuarios.id_rol= roles.id_rol"; //Sirve para guardar la informacion de la consulta de la tabla (usuario) y se almacena en la variable $sql
    $resultado = mysqli_query($conexion, $sql);
    $numero_registro = mysqli_num_rows($resultado);

    $sql2 = "SELECT id_usuario, COUNT(id_usuario) AS frecuencia from sesiones where id_usuario = '$cedula'";
    $resultado2 = mysqli_query($conexion, $sql2);
    $fila2 = mysqli_fetch_assoc($resultado2);

    if ($numero_registro != 0) {

        while (($fila = mysqli_fetch_assoc($resultado)) == true) {

            if ($fila["id_rol"] == 1) {

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

                $_SESSION['rol'] = $fila["id_rol"];
                header("Location:../inicio.php");
                echo "ingresaste como admin";
            } elseif ($fila["id_rol"] == 2) {

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
                $_SESSION['rol'] = $fila["id_rol"];
                echo "ingresaste como trabajador";
                header("Location:../inicio.php");
            }
        }
    } else {

        echo " no eres personal";
    }
    
}
