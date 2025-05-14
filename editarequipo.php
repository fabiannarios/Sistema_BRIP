<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar componente</title>
    <link rel="icon" href="./css/img/favicon.ico" sizes="any" />
    <link rel="stylesheet" href="./datatable/datatables1.css">
    <link href="./css/tabla.css" rel="stylesheet">
    <link href='./inicio.css' rel='stylesheet'>
    <link href="./css/header.css" rel="stylesheet">
    <link href='./css/bootstrap.css' rel='stylesheet'>
    <link href='./css/boxicons-2.1.4/css/boxicons.css' rel='stylesheet'>

</head>
<body>
  <?php  
  include_once('./config/conecxion_bd.php');
  include_once('./header.php'); 
  $sql= "SELECT * FROM equipos WHERE id_equipo =".$_REQUEST['id_equipo'];

  $resultado = $conexion->query($sql);

  $row = $resultado->fetch_assoc();
  
  ?>

<input type="hidden" id="codigo" name="codigo"  value="<?php echo $row['id_equipo'] ?> "  required>

<div class=" text-center my-5">
    <h1> EDITAR EQUIPO</h1>
</div>

    
  <form class="row g-3 container-sm mt-4 mx-auto px-4 py-3 shadow p-3 mb-5 bg-body-tertiary rounded form-registro" action="./config/actualizarequipo.php" method="POST">

            <div class="col-md-6">
                <label for="codigo">Código:</label>
                <input type="text" id="codigo" name="codigo"  value="<?php echo $row['id_equipo'] ?> " disabled  required>
            </div>

            <div class="col-md-6">
                <label for="nombre">Nombre del Componente:</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo $row['nombre'] ?>" required>
            </div>

            <div class="col-md-4">
                <label for="proceso">Proceso:</label>
                <select class="form-select fs-4" id="proceso" name="proceso">
                    <?php 
                        $sql1 = "SELECT * FROM procesos WHERE id_proceso =". $row['id_proceso'];
                        $resultado1 = $conexion->query($sql1);

                        $row1 = $resultado1->fetch_assoc();
                    
                        echo "<option selected value='". $row1['id_proceso']."'>".$row1['nombre_proceso']."</option>";

                        $sql2 = "SELECT * FROM procesos";
                        $resultado2 = $conexion->query($sql2);

                        while ($fila = $resultado2->fetch_array()){
                            echo "<option value='".$fila['id_proceso']."'>".$fila['nombre_proceso']."</option>";
                        }
                    
                    
                    ?>
                </select>

            </div>
            <label for="observacion">Observación:</label>
            <textarea id="observacion" name="observacion" ><?php echo $row['observacion'] ?></textarea>

            <div class="col-md-4">
                <label for="estado">Estado:</label>
                <select class="form-select fs-4" id="estado" name="estado">
                    <option  value="verde">Disponible</option>
                    <option value="amarillo">Baja Confiabilidad</option>
                    <option value="rojo">No Disponible</option>
                </select>
            </div>
            <label for="fecha_revision">Última Revisión:</label>
            <input type="date" id="fecha_revision" name="fecha_revision" value="<?php echo $row['ultima_revision'] ?>">

            <div class="col-12 my-3 text-center">
                <button type="submit" class="btn btn-success fs-4 rounded-pill">Guardar Componente</button>
            </div>
            <input type="hidden" id="codigo" name="codigo"  value="<?php echo $row['id_equipo'] ?> "  required>

        </form>


</body>
</html>