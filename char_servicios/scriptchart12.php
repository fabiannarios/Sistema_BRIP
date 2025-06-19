<?php 
include ('../config/conecxion_bd.php');
$sql1 = "SELECT 
        SUM(CASE WHEN estado = 'verde' THEN 1 ELSE 0 END) AS verde,
        SUM(CASE WHEN estado = 'amarillo' THEN 1 ELSE 0 END) AS amarillo,
        SUM(CASE WHEN estado = 'rojo' THEN 1 ELSE 0 END) AS rojo

     FROM equipos WHERE id_planta = 2 AND id_proceso = 211";

     $resultado1 = $conexion->query($sql1);
     $datos12 = [];

     while($row1 = $resultado1->fetch_assoc()){
            array_push($datos12,$row1);
     }

     echo json_encode($datos12);
     ?>