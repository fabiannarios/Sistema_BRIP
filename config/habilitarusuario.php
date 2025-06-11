<?php


include('conecxion_bd.php');

if (isset($_GET['id_usuario'])) {

    $id = $_GET['id_usuario'];

    $sql1 = "SELECT activo FROM usuarios WHERE id_usuario ='".$id."'";
    $resultado= $conexion->query($sql1);
    $row = $resultado->fetch_assoc();

    if ($row['activo'] == '1') {
         $sql = "UPDATE usuarios SET activo = 0 
            WHERE id_usuario = '".$id."'";
             if ($conexion->query($sql) === TRUE) {

         echo "<script type='text/javascript'>";
            echo "alert('Usuario Inhabilitado');";
            echo "window.location.href = '../configuracion.php';";
            echo "</script>";

    } else {
        echo "Error al eliminar: " . $conexion->error;
    }

    } else {
         $sql = "UPDATE usuarios SET activo = 1
            WHERE id_usuario = '".$id."'";

             if ($conexion->query($sql) === TRUE) {
         echo "<script type='text/javascript'>";
            echo "alert('Usuario habilitado');";
            echo "window.location.href = '../configuracion.php';";
            echo "</script>";
    } else {
        echo "Error al eliminar: " . $conexion->error;
    }
    }
   
} else {
    echo "ID no especificado.";
}
?>