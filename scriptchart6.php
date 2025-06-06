<?php 
include ('./config/conecxion_bd.php');
      $sql6 = "SELECT 
        SUM(CASE WHEN estado = 'verde' THEN 1 ELSE 0 END) AS verde,
        SUM(CASE WHEN estado = 'amarillo' THEN 1 ELSE 0 END) AS amarillo,
        SUM(CASE WHEN estado = 'rojo' THEN 1 ELSE 0 END) AS rojo

     FROM equipos WHERE id_planta = 0 AND id_proceso = 105";

     $resultado6 = $conexion->query($sql6);
     $datos6 = [];

     while($row6 = $resultado6->fetch_assoc()){
            array_push($datos6,$row6);
     }


     echo json_encode($datos6);
?>