<?php 

include ('../config/conecxion_bd.php');
      $sql4 = "SELECT 
        SUM(CASE WHEN estado = 'verde' THEN 1 ELSE 0 END) AS verde,
        SUM(CASE WHEN estado = 'amarillo' THEN 1 ELSE 0 END) AS amarillo,
        SUM(CASE WHEN estado = 'rojo' THEN 1 ELSE 0 END) AS rojo

     FROM equipos WHERE id_planta = 2 AND id_proceso = 203";

     $resultado4 = $conexion->query($sql4);
     $datos4 = [];

     while($row4 = $resultado4->fetch_assoc()){
            array_push($datos4,$row4);
     }

     echo json_encode($datos4);
?>