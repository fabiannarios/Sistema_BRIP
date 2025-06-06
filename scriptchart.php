<?php 
    include ('./config/conecxion_bd.php');

    $sql = "SELECT 
        SUM(CASE WHEN estado = 'verde' THEN 1 ELSE 0 END) AS verde,
        SUM(CASE WHEN estado = 'amarillo' THEN 1 ELSE 0 END) AS amarillo,
        SUM(CASE WHEN estado = 'rojo' THEN 1 ELSE 0 END) AS rojo

     FROM equipos WHERE id_planta = 0";

     $resultado = $conexion->query($sql);
     $datos = [];

     while($row = $resultado->fetch_assoc()){
            array_push($datos,$row);
     }

     echo json_encode($datos);

?>