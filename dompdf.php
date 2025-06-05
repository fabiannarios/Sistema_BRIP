<?php 
          require_once 'dompdf/autoload.inc.php';
            use Dompdf\Dompdf;
          ob_start();

<div class="container-fluid">
          
            include("../Sistema_BRIP/config/conecxion_bd.php");
                ob_start();

            $sql = "SELECT * FROM equipos";
            $result = $conexion->query($sql);
            if ($result->num_rows > 0) {
               
               $html .= "<table id='tabla' class='pequiven-table'>"
                    "<thead>"
                    "<tr>"
                    "<th scope='col'>TAG</th>"
                    "<th scope='col'>Nombre</th>"
                    "<th scope='col'>Planta</th>"
                    "<th scope='col'>Proceso</th>"
                    "<th scope='col'>Observaciones</th>"
                    "<th scope='col'>Estado</th>"
                    "<th scope='col'>Fecha de la ultima revision</th>"
                    
                    "</tr>"
                "</thead>"



                "<tbody class='table-group-divider'>"
                
                while ($row = $result->fetch_assoc()) {
                    
                    "<tr>"
                    "<td> echo". $row['id_equipo']  ."</td>"
                        "<td> echo $row['nombre']</td>"
                        <td>   $sql1 = "SELECT * FROM plantas WHERE id_planta =". $row['id_planta'];          
                            $resultado = $conexion->query($sql1);

                            $row1 = $resultado->fetch_assoc();
                        
                            echo $row1['nombre_planta']            </td>  
                        <td>
                        $sql2 = "SELECT * FROM procesos WHERE id_proceso =". $row['id_proceso'];
                        $resultado2 = $conexion->query($sql2);

                        $row2 = $resultado2->fetch_assoc();
                        echo $row2['nombre_proceso']</td>
                        <td>echo $row['observacion'] </td>


                        

                        if ($row['estado'] == 'verde' ) {
                            echo "<td class = 'tabla-verde'> Disponible </td>";  
                        } else if ($row['estado'] =='amarillo') {
                            echo "<td class = 'tabla-amarillo'> Baja confiabilidad </td>";
                        } else {
                            echo "<td class = 'tabla-rojo'> No disponible </td>";
                        }
                        


                        <td> echo $row['ultima_revision']</td>


                       
                        </tr>
                     
                }
                     </tbody>
                
             
            }
            
           
            </table>
       
                    
                    $html = ob_get_clean();

                    
                    // instantiate and use the dompdf class
                    $dompdf = new Dompdf();

                    $options = $dompdf->getoptions();
                   $options->set(array('isRemoteEnabled' => true));
                   $dompdf->setOptions($options);
                   $dompdf->loadHtml($html);

                    // (Optional) Setup the paper size and orientation
                   $dompdf->setPaper('A4', 'landscape');

                    // Render the HTML as PDF
                   $dompdf->render();

                    // Output the generated PDF to Browser
                   $dompdf->stream("archivo.pdf"); 
                    
                    $conexion->close();
                    ?>