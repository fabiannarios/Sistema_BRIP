<?php


require './config/conecxion_bd.php';
require './excel/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\{Spreadsheet, IOFactory};

$sql = "SELECT * FROM equipos WHERE id_planta =" . $_GET['id_planta'];
$result = $conexion->query($sql);
$row = $result->fetch_assoc();

$excel = new Spreadsheet();
$hojaactiva = $excel->getActiveSheet();
$hojaactiva->setTitle("Equipos");

$hojaactiva->setCellValue('A1', 'TAG');
$hojaactiva->setCellValue('B1', 'Nombre');
$hojaactiva->setCellValue('C1', 'Planta');
$hojaactiva->setCellValue('D1', 'Proceso');
$hojaactiva->setCellValue('E1', 'Observaciones');
$hojaactiva->setCellValue('F1', 'Estado');
$hojaactiva->setCellValue('G1', 'Fecha de la ultima revision');

$fila = 2;

while ($rows = $result->fetch_assoc()) {

 $sql1 = "SELECT * FROM plantas WHERE id_planta =" . $rows['id_planta'];
    $resultado = $conexion->query($sql1);

    $row1 = $resultado->fetch_assoc();


    $sql2 = "SELECT * FROM procesos WHERE id_proceso =" . $rows['id_proceso'];
    $resultado2 = $conexion->query($sql2);

    $row2 = $resultado2->fetch_assoc();

  $hojaactiva->setCellValue('A'  . $fila,$rows['id_equipo']);
  $hojaactiva->setCellValue('B'  . $fila,$rows['nombre']);
  $hojaactiva->setCellValue('C'  . $fila,$row1['nombre_planta']);
  $hojaactiva->setCellValue('D'  . $fila,$row2['nombre_proceso']);
  $hojaactiva->setCellValue('E'  . $fila,$rows['observacion']);
  $hojaactiva->setCellValue('F'  . $fila,$rows['estado']);
  $hojaactiva->setCellValue('G'  . $fila,$rows['ultima_revision']);
  $fila++;
}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Equipos.xlsx"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($excel, 'Xlsx');
$writer->save('php://output');
exit;
?>
