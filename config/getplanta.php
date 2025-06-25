 <?php 
 
require 'conecxion_bd.php';


        $complejo= $conexion->real_escape_string($_POST['complejo']);

        
                $sql = "SELECT id_planta, nombre_planta FROM plantas WHERE nombre_complejo='". $complejo ."'";

                    $resultado = $conexion->query($sql);
                    $respuesta = "<option value='' disabled selected>Seleccionar</option>";

    while ($row = $resultado->fetch_assoc()) {
        $respuesta .= "<option value= '".$row['id_planta']."'>".$row['nombre_planta']."</option>";
    }
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
     ?>