<?php

include('../conexion/conexion.php');

//Obtenemos los valores del formulario

$autor_id = $_POST['autor_id'];

//Abrimos la conexion a la base de datos

$conexion = conectar();

//Consulta a la base de datos

$query = $conexion->prepare("DELETE FROM autor WHERE autor_id = '$autor_id'");

$query->bind_param('i',$autor_id);

$msg = '';

if ($query->execute()) {
    $msg = 'Se elimino al Autor';
} else {
    $msg = 'No se pudo eliminar el autor';
}

//Cerramos la base de datos
desconectar($conexion);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Autor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body style="background-color: rgb(170, 170, 178);">
    <div class="container">
        <div class="card mt-5">
            <div class="card-header bg-info text-dark text-center">
                <h1>Eliminar Autor</h1>
            </div>
                <div class="card-body text-center">
                <h3> <?php echo $msg?> </h3>
                <div>
                    <a class="btn btn-primary" href="autores.php" role="button">Regresar</a>
                </div>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>