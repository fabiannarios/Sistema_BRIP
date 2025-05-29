<?php 
include_once('conecxion_bd.php');
include('ingresar_sistema.php');

$sql2 = "SELECT id_usuario from sesiones where id_usuario = '$cedula'";
    
$sql = "UPDATE sesiones
            SET 
                fecha_fin = '".$fechainicio."'
                WHERE id_usuario = '".$cedula."'";


$conexion->query($sql);
session_destroy();
header('location:../views/login.php');
?>