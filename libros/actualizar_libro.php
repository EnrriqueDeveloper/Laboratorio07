<?php

include('../conexion/conexion.php');

//Obtenemos los valores del formulario

$libro_id = $_POST['libro_id'];
$titulo = $_POST['titulo'];
$autor_id = $_POST['autor_id'];
$anio = $_POST['anio'];
$especialidad = $_POST['especialidad'];
$editorial = $_POST['editorial'];
$url = $_POST['url'];

//Abrimos la conexion a la base de datos

$conexion = conectar();

//Consulta a la base de datos

$query = $conexion->prepare("UPDATE libro SET titulo = '$titulo', autor_id = '$autor_id', anio = '$anio', especialidad = '$especialidad' , editorial = '$editorial' , url = '$url' WHERE libro_id = '$libro_id'");

$query->bind_param('siisssi',$titulo,$autor_id,$anio,$especialidad,$editorial,$url,$libro_id);

$msg = '';

if ($query->execute()) {
    $msg = 'Se actualizo el libro seleccionado';
} else {
    $msg = 'No se pudo actualizar el libro';
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
    <title>Actualizar Libro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body style="background-color: aquamarine;">
    <div class="container">
        <div class="card mt-5">
            <div class="card-header bg-info text-dark text-center">
                <h1>Actualizar Libro</h1>
            </div>
                <div class="card-body text-center">
                <h3> <?php echo $msg?> </h3>
                <div>
                    <a class="btn btn-primary" href="libros.php" role="button">Volver</a>
                </div>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>