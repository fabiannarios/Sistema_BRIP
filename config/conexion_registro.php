<?php
include ('conecxion_bd.php');



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_usuario = $_POST['id_usuario'];
    $nombre = $_POST['nombre'];
    $id_rol = $_POST['id_rol'];
    $planta = $_POST['planta'];
    $complejo = $_POST['complejo'];
    $telefono = $_POST['telefono'];
    $fecha = $_POST['fecha_creacion'];
    $departamento = $_POST['departamento'];


    try { 
    $sql = "INSERT INTO usuarios (id_usuario,nombre,cargo,id_planta,departamento,nombre_complejo,telefono,fecha_creacion) 
            VALUES ('$id_usuario ','$nombre', '$id_rol','$departamento','$planta','$complejo','$telefono','$fecha')";

    if ($conexion->query($sql) === TRUE) {
         echo "<script type='text/javascript'>";
            echo "alert('Responsable ingresado con exito');";
            echo "window.location.href = '../views/inicio.php';";
          echo "</script>";
        exit();
  
}

} catch (mysqli_sql_exception $e ) {

            $conexion->rollback();
            
            if ($e->getCode()==1062) {               
              echo "<script type='text/javascript'>";
            echo "alert('Usuario duplicado');";
            echo "window.location.href = '../views/configuracion.php';";
            echo "</script>";
        
            } else {
            throw ($e)  ;                      
                }

        }
    }

$conexion->close();
?>
