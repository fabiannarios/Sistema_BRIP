<?php 
include ('../config/conecxion_bd.php');
      $sql3 = "SELECT 
        SUM(CASE WHEN estado = 'verde' THEN 1 ELSE 0 END) AS verde,
        SUM(CASE WHEN estado = 'amarillo' THEN 1 ELSE 0 END) AS amarillo,
        SUM(CASE WHEN estado = 'rojo' THEN 1 ELSE 0 END) AS rojo

     FROM equipos WHERE id_planta = 2 AND id_proceso = 202";

     $resultado3 = $conexion->query($sql3);
     $datos3 = [];

     while($row3 = $resultado3->fetch_assoc()){
            array_push($datos3,$row3);
     }
     echo json_encode($datos3);

?>