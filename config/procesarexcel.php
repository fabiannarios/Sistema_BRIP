<?php
include('conecxion_bd.php');
require '../excel/vendor/autoload.php';
use  PhpOffice\PhpSpreadsheet\IOFactory;
// Validar que los datos fueron enviados correctamente
if (isset($_POST['send'])) {

    if ($_FILES['excel']['size']>0) {

        $archivocontent = $_FILES['excel']['tmp_name'];
       

//try { 
       $Documento = IOFactory::load($archivocontent);
       
       $totalhojas = $Documento->getSheetCount();
       
        //for ($i=0; $i < $totalhojas ; $i++) { 
           $hojaActual = $Documento->getSheet(0);
            

           $numeroFilas = $hojaActual->getHighestDataRow();
            echo $numeroFilas;
             echo "</br>";
          
           $letra = $hojaActual->getHighestColumn();
           echo $numeroFilas;
            echo "</br>";
          
 echo "</br>";        //}

            for ($i=2; $i <=$numeroFilas ; $i++) {
                try {
               
                $valor = $hojaActual->getCell('A'.$i)->getValue();
                $valor1 = $hojaActual->getCell('B'.$i)->getValue();
                $valorplanta = $hojaActual->getCell('C'.$i)->getValue();
                $valorproceso = $hojaActual->getCell('D'.$i)->getValue();
                $valor4 = $hojaActual->getCell('E'.$i)->getValue();
                $valor5 = $hojaActual->getCell('F'.$i)->getValue();
                $valor6 = $hojaActual->getCell('G'.$i)->getFormattedValue();


                if ($valor5 == "disponible" ||$valor5 == "verde") {
                    $valor5 = "verde";
                } elseif ($valor5 =="baja confiabilidad" || $valor5 == "amarillo") {
                    $valor5 = "amarillo";
                 } else {
                    $valor5 = "rojo";
                }

                $sql1 = "SELECT id_planta from plantas WHERE nombre_planta='".$valorplanta."'";
                $resultado1= $conexion->query($sql1);
                $row1 = $resultado1->fetch_assoc();
                $valor2 = $row1['id_planta']; 

                $sql2 = "SELECT id_proceso from procesos WHERE nombre_proceso='".$valorproceso."'";
                $resultado2= $conexion->query($sql2);
                $row2 = $resultado2->fetch_assoc();
                $valor3 = $row2['id_proceso']; 
                
                

                $sql = "INSERT INTO equipos (id_equipo, nombre, id_planta, id_proceso, observacion, estado, ultima_revision) 
                                     VALUES ('$valor', '$valor1', '$valor2', '$valor3', '$valor4', '$valor5', '$valor6')";
                $conexion->query($sql);        

           

                    } catch (mysqli_sql_exception $e ) {

             $conexion->rollback();
            
            switch ($e->getCode()) {
                case 1062:
                 echo "";

                    break;

                     case 1452:  
                    echo "<script type='text/javascript'>";
                    echo "alert('Proceso completado');";
                    echo "window.location.href = '../equipos.php';";
                    echo "</script>";
                        
                    break;
                
                default:
                 echo "<script type='text/javascript'>";
                    echo "alert('Error en los datos');";
                    echo "window.location.href = '../equipos.php';";
                    echo "</script>";
                    break;
            }      
            
        }     
            
            }
            
            echo "<script type='text/javascript'>";
            echo "alert('Equipos ingresados con exito');";
            echo "window.location.href = '../equipos.php';";
            echo "</script>";
    
    }else{
        echo "No existe archivo seleccionado";
    }

}
// Cerrar conexión


    


$conexion->close();
?>