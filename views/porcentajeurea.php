<?php

include('./config/conecxion_bd.php');

        $sql = "SELECT
            *,
            COUNT(*) AS disponibles,
            (COUNT(*) / (SELECT COUNT(*) FROM equipos WHERE id_planta = 1)) * 100 AS porcentaje
        FROM
            equipos
        WHERE
        estado = 'verde' AND id_planta = 1
        GROUP BY
            estado";

        $resultado = $conexion->query($sql);
        
        if ($row = $resultado->fetch_assoc()) {

           echo $row['porcentaje'];
        echo "%";
 
        } else {
            echo '0%';
        }
       
            
?>
