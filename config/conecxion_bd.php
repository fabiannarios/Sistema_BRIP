<?php

$server = "localhost";
$user = "root";
$password = "";
$bd = "cphc_amoniaco";

$conexion = new mysqli($server, $user, $password, $bd);

if ($conexion->connect_error) {
    die("conexion fallida" . $conexion->connect_error);

} else {
    
}
?>