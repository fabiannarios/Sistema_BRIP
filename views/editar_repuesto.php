 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Editar Repuestos</title>

        <link rel="icon" href="favicon.ico" sizes="any" />
        <link rel="stylesheet" href="./datatable/datatables1.css">
        <link href="./css/tabla.css" rel="stylesheet">
        <link href='./css/inicio.css' rel='stylesheet'>
        <link href="./css/header.css" rel="stylesheet">
        <link href='./css/bootstrap.css' rel='stylesheet'>
        <link href='./css/boxicons/fonts/basic/boxicons.css' rel='stylesheet'>

 </head>

 <body>
    <?php include_once('./config/conecxion_bd.php');
    include_once('./header.php');
    $sql = "SELECT * FROM repuesto WHERE id_repuesto ='" . $_GET['id_repuesto']."'";

    $resultado = $conexion->query($sql);

    $row = $resultado->fetch_assoc(); 
    ?>
        <h1 class="text-center  mt-4 border-bottom-4">Solicitar Repuestos</h1>

 <form class="row g-3 container-sm mt-4 mx-auto px-4 py-3 shadow p-3 mb-5 bg-body-tertiary rounded form-registro" action="./config/actualizarrepuesto.php" method="POST">

            <div class="col-md-6">
                <label for="codigo">TAG de Repuesto :</label>
                <input type="text" id="codigo" name="codigo" value="<?php echo $row['id_repuesto'] ?> " required>
            </div>

            <div class="col-md-6">
                <label for="nombre">Nombre del repuesto:</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo $row['nombre'] ?> " required>
            </div>



            <div class="col-md-6">
                <label for="costo">Costo del repuesto:</label>
                <input type="text" id="costo" name="costo" value="<?php echo $row['costo'] ?> " required>
            </div>

            <div class="col-md-6">
                <label for="cantidad">Cantidad:</label>
                <input type="text" id="cantidad" name="cantidad" value="<?php echo $row['cantidad'] ?> " required>
            </div>

            <div class="col-md-4">
                <label for="estado">Estado:</label>
                <select class="form-select fs-4" id="estado" name="estado">
                    <option value="recibido">Recibido</option>
                    <option value="solicitado">Solicitado</option>
                    <option value="en_transito">En transito</option>
                </select>
            </div>

            <label for="fecha_solicitud">Fecha de solicitud:</label>
            <input type="date" id="fecha_solicitud" name="fecha_solicitud" value="<?php $d = strtotime("yesterday");
                                                                                    echo date("Y-m-d", $d) ?>">

            <label for="fecha_recepcion">Fecha de recepcion:</label>
            <input type="date" id="fecha_recepcion" name="fecha_recepcion" value="<?php $d = strtotime("yesterday");
                                                                                    echo date("Y-m-d", $d) ?>">




            <div class="col-12 my-3 text-center">
                <button type="submit" class="btn btn-success fs-4 rounded-pill">Guardar Repuesto</button>
            </div>

             <input type="hidden" id="id" name="id" value="<?php echo $row['id_repuesto'] ?>" required>
        </form>

        </body>
 </html>