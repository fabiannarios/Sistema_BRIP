<?php 
include ('../config/conecxion_bd.php');
     $sql8 = "SELECT 
        SUM(CASE WHEN estado = 'verde' THEN 1 ELSE 0 END) AS verde,
        SUM(CASE WHEN estado = 'amarillo' THEN 1 ELSE 0 END) AS amarillo,
        SUM(CASE WHEN estado = 'rojo' THEN 1 ELSE 0 END) AS rojo

     FROM equipos WHERE id_planta = 2 AND id_proceso = 207";

     $resultado8 = $conexion->query($sql8);
     $datos8 = [];

     while($row8 = $resultado8->fetch_assoc()){
            array_push($datos8,$row8);
     }


     echo json_encode($datos8);

?>