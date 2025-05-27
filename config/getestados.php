 <?php 
 
require 'conecxion_bd.php';


        $estado= $conexion->real_escape_string($_GET['estado']);

        
                $sql = "SELECT estado FROM equipos WHERE estado = $estado";

                    $resultado = $conexion->query($sql);
                   

    while ($row = $resultado->fetch_assoc()) {


        if ($_GET['estado'] == 'verde') {
           $respuesta .= "<td class = 'tabla-verde'> Disponible </td>";
        } elseif ($_GET['estado'] == 'amarillo') {
            $respuesta .= "<td class = 'tabla-amarillo'> Baja confiabilidad </td>";
        } else{
             $respuesta.= "<td class = 'tabla-rojo'> No disponible </td>";
        }

        
    }
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
     ?>