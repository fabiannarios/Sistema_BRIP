<?php 
          require_once 'dompdf/autoload.inc.php';
            use Dompdf\Dompdf;
          ob_start();

          $html.=" <!--DOCTYPE html-->
<html>
    <head>
           <meta charset='utf-8'>
           <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>

        <title>OCS Inventory</title>
        <link rel='shortcut icon' href='favicon.ico'>
        <link rel='stylesheet' href='libraries/bootstrap/css/bootstrap.min.css'>
        <link rel='stylesheet' href='libraries/bootstrap/css/bootstrap-theme.min.css'>
        <link rel='stylesheet' href='libraries/select2/css/select2.min.css' />
        <link rel='stylesheet' href='css/dataTables-custom.css'>
        <link rel='stylesheet' href='libraries/datatable/media/css/dataTables.bootstrap.css'>
        <link rel='stylesheet' href='css/ocsreports.css'>
        <link rel='stylesheet' href='css/bootstrap-datetimepicker.css'>
        <link rel='stylesheet' href='css/header.css'>
        <link rel='stylesheet' href='css/computer_details.css'>
        <link rel='stylesheet' href='css/bootstrap-formhelpers.css'>
        <link rel='stylesheet' href='css/forms.css'>    
        
        <style>

        body{
        font-family: Arial, sans-serif;
        background-color: #FAFAFA;
        }

        div {
            text-align:center;

            
          }

          h3{
            color: white;
            width: auto;
            text-align: center;
            position: relative;
            align-items: center;
            border: solid 1px #C8142A;
            border-radius: 5px;
            background-color: #C8142A;
        
        }

        h1{
            color: #FFFFFF;
            text-align: center;
            border: solid 1px #C8142A;
            border-radius: 5px;
            background-color: #C8142A;
        }

        
        table {
            width: 100%;
            max-width: 100%;
            
            border-spacing: 0;
            border-collapse: collapse;
            border: solid 1px black;

            margin: 0 auto;

            font-size: 10px;
            page-break-inside: avoid;
        }
        
          td,th {
             padding: 2px;
            
            }
                thead {
                    display: table-header-group;
                    background-color: #E3E3E3;
                  }
                  
                  tr {
                    page-break-inside: avoid;
                  }

                  td{
                text-align: center;  
                }

                tbody{
                    background-color: #FFFF;

                }
              
        
        </style>";

$html .= "<div class='container-fluid'>";
          
            include("../Sistema_BRIP/config/conecxion_bd.php");

            $sql = "SELECT * FROM equipos WHERE id_planta = 0";
            $result = $conexion->query($sql);
            if ($result->num_rows > 0) {
               
               $html .= "<table id='tabla' class='pequiven-table'>";
                $html.=    "<thead>";
                    $html.="<tr>";
                    $html.="<th scope='col'>TAG</th>";
                    $html.="<th scope='col'>Nombre</th>";
                    $html.="<th scope='col'>Planta</th>";
                    $html.="<th scope='col'>Proceso</th>";
                    $html.="<th scope='col'>Observaciones</th>";
                    $html.="<th scope='col'>Estado</th>";
                    $html.="<th scope='col'>Fecha de la ultima revision</th>";
                    
                    $html.="</tr>";
                $html.="</thead>";



                $html.="<tbody class='table-group-divider'>";
                
                while ($row = $result->fetch_assoc()) {
                    
                    $html.="<tr>";
                    $html.="<td>". $row['id_equipo']  ."</td>";
                     $html.=   "<td>". $row['nombre'] ."</td>";
                          $sql1 = "SELECT * FROM plantas WHERE id_planta =". $row['id_planta'];          
                            $resultado = $conexion->query($sql1);

                            $row1 = $resultado->fetch_assoc();
                        
                       $html.= "<td>".$row1['nombre_planta'] ."</td> "; 
                        
                        $sql2 = "SELECT * FROM procesos WHERE id_proceso =". $row['id_proceso'];
                        $resultado2 = $conexion->query($sql2);

                        $row2 = $resultado2->fetch_assoc();
                        $html.= "<td>". $row2['nombre_proceso'] ."</td>";
                        
                        $html.= "<td>". $row['observacion'] . "</td>";


                        

                        if ($row['estado'] == 'verde' ) {
                            $html.="<td class = 'tabla-verde'> Disponible </td>";  
                        } else if ($row['estado'] =='amarillo') {
                            $html.="<td class = 'tabla-amarillo'> Baja confiabilidad </td>";
                        } else {
                            $html.="<td class = 'tabla-rojo'> No disponible </td>";
                        }
                        


                       $html.= "<td>".$row['ultima_revision']."</td>";


                       
                       $html.=  "</tr>";
                     
                }
                     $html .="</tbody>";
                
             
            }
            
           
            $html .="</table>";
       

                    
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
              header("Content-type: application/pdf");
              header("Content-Disposition: inline; filename= Archivo". date('Y:m:d:m:s').".pdf");
                    // Output the generated PDF to Browser
                   echo $dompdf->output();
                    
                    $conexion->close();
                    ?>