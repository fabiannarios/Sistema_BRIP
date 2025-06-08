<?php
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=documento_exportado_" . date('Y:m:d:m:s') . ".xls");
header("Pragma: no-cache");
header("Expires: 0");

require('./config/conecxion_bd.php');

$output = "";


$sql = "SELECT * FROM equipos WHERE id_planta = 0";
$result = $conexion->query($sql);
if ($result->num_rows > 0) {

  $output .="<table id='tabla' class='pequiven-table'>
            <thead>
                    <tr>;
                    <th scope='col'>TAG</th>;
                    <th scope='col'>Nombre</th>;
                    <th scope='col'>Planta</th>;
                    <th scope='col'>Proceso</th>;
                    <th scope='col'>Observaciones</th>;
                    <th scope='col'>Estado</th>;
                    <th scope='col'>Fecha de la ultima revision</th>;
                    
                    </tr>
                </thead>";


  $output .= "<tbody class='table-group-divider'>";

  while ($row = $result->fetch_assoc()) {

    $sql1 = "SELECT * FROM plantas WHERE id_planta =" . $row['id_planta'];
    $resultado = $conexion->query($sql1);

    $row1 = $resultado->fetch_assoc();


    $sql2 = "SELECT * FROM procesos WHERE id_proceso =" . $row['id_proceso'];
    $resultado2 = $conexion->query($sql2);

    $row2 = $resultado2->fetch_assoc();




    $output .= "<tr>
                   <td>" . $row['id_equipo']  . "</td>
                       <td>" . $row['nombre'] . "</td>
                          
                        
                      <td>" . $row1['nombre_planta'] . "</td> 
                        
                    
                        <td>" . $row2['nombre_proceso'] . "</td>
                        
                        <td>" . $row['observacion'] . "</td>";




    if ($row['estado'] == 'verde') {
      $output .= "<td class = 'tabla-verde'> Disponible </td>";
    } else if ($row['estado'] == 'amarillo') {
      $output .= "<td class = 'tabla-amarillo'> Baja confiabilidad </td>";
    } else {
      $output .= "<td class = 'tabla-rojo'> No disponible </td>";
    }



    $output .= "<td>" . $row['ultima_revision'] . "</td>";



    $output .=  "</tr>";
  }
  $output .= "</tbody>";
}


$output .= "</table>";

echo $output;
?>