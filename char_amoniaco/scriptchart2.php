<?php 

include ('../config/conecxion_bd.php');
     $sql2 = "SELECT 
        SUM(CASE WHEN estado = 'verde' THEN 1 ELSE 0 END) AS verde,
        SUM(CASE WHEN estado = 'amarillo' THEN 1 ELSE 0 END) AS amarillo,
        SUM(CASE WHEN estado = 'rojo' THEN 1 ELSE 0 END) AS rojo

     FROM equipos WHERE id_planta = 0 AND id_proceso = 101";

     $resultado2 = $conexion->query($sql2);
     $datos2 = [];

     while($row2 = $resultado2->fetch_assoc()){
            array_push($datos2,$row2);
     }

    echo json_encode($datos2);


?>