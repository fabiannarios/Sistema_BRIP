 <?php 
 
require 'conecxion_bd.php';


        $idplanta= $conexion->real_escape_string($_POST['id_planta']);

                $sql = "SELECT id_proceso, nombre_proceso FROM procesos WHERE id_planta = $idplanta";

                    $resultado = $conexion->query($sql);
                    $respuesta = "<option value=''>Seleccionar</option>";

    while ($row = $resultado->fetch_assoc()) {
        $respuesta .= "<option value= '".$row['id_proceso']."'>".$row['nombre_proceso']."</option>";
    }
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
     ?>