<?php 
 include ('../config/conecxion_bd.php');
      $sql7 = "SELECT 
        SUM(CASE WHEN estado = 'verde' THEN 1 ELSE 0 END) AS verde,
        SUM(CASE WHEN estado = 'amarillo' THEN 1 ELSE 0 END) AS amarillo,
        SUM(CASE WHEN estado = 'rojo' THEN 1 ELSE 0 END) AS rojo

     FROM equipos WHERE id_planta = 2 AND id_proceso = 206";

     $resultado7 = $conexion->query($sql7);
     $datos7 = [];

     while($row7 = $resultado7->fetch_assoc()){
            array_push($datos7,$row7);
     }


     echo json_encode($datos7);


?>