<?php

session_start();



if(isset($_GET["iniciar"])){ 

    $cedula=$_GET["id_usuario"];
    $nombre=$_GET["nombre"];

    include("conecxion_bd.php");

    $conexion=mysqli_connect($server,$user,$password,$bd);
    

        // $sql="SELECT * FROM USUARIO WHERE usuario='$id_usuario' AND contraseña='$nombre' AND rol=1";
    $sql="SELECT * FROM usuarios, roles where usuarios.id_usuario = '$cedula' AND usuarios.nombre= '$nombre' AND usuarios.id_rol= roles.id_rol";//Sirve para guardar la informacion de la consulta de la tabla (usuario) y se almacena en la variable $sql
    $resultado=mysqli_query($conexion, $sql);

    $numero_registro = mysqli_num_rows($resultado);
    
    if ($numero_registro != 0) {

        while(($fila=mysqli_fetch_assoc($resultado))==true) {

                if ($fila["id_rol"]==1) {
                    
                    header("Location:../inicio.php");
                    echo "ingresaste como admin";
                
                }elseif ($fila["id_rol"]==2) {
                header("Location:../inicio.php");
                    echo "ingresaste como trabajador";
                }

        
        }

    }else{
       
        echo " no eres personal";
        echo $cedula;
        echo $nombre;

    }  
    mysqli_free_result ($resultado);
    mysqli_close($conexion);

}



?>
