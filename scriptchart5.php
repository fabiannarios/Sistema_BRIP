<?php 
include ('./config/conecxion_bd.php');
 $sql5 = "SELECT 
        SUM(CASE WHEN estado = 'verde' THEN 1 ELSE 0 END) AS verde,
        SUM(CASE WHEN estado = 'amarillo' THEN 1 ELSE 0 END) AS amarillo,
        SUM(CASE WHEN estado = 'rojo' THEN 1 ELSE 0 END) AS rojo

     FROM equipos WHERE id_planta = 0 AND id_proceso = 104";

     $resultado5 = $conexion->query($sql5);
     $datos5 = [];

     while($row5 = $resultado5->fetch_assoc()){
            array_push($datos5,$row5);
     }


     echo json_encode($datos5);

?>