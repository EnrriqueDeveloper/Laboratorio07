<?php

include('../conexion/conexion.php');

// ---Abrimos la conexion a la base de datos---
$conexion = conectar();

//Consulta la base de datos

$query = $conexion->prepare("SELECT libro_id, titulo, autor_id, anio, especialidad, editorial, url FROM libro");
$query -> execute();
$resultado = $query->get_result();

desconectar($conexion);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body style="background-color:aquamarine">
    <div class="container">
        <div class="card mt-5 text-center" style="width: 1500px;">
            <div class="card-header bg-info text-dark">
                <h1><div>Libros</div></h1>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titulo</th>
                            <th>ID del Autor</th>
                            <th>Año</th>
                            <th>Especialidad</th>
                            <th>Editorial</th>
                            <th>URL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($libro = $resultado->fetch_assoc()) {

                            $libro_id = $libro['libro_id'];
                            $titulo = $libro['titulo'];
                            $autor_id = $libro['autor_id'];
                            $anio = $libro['anio'];
                            $especialidad = $libro['especialidad'];
                            $editorial = $libro['editorial'];
                            $url = $libro['url'];

                            echo '<tr>';
                            echo '<td>' .$libro_id. '</td>';
                            echo '<td>' .$titulo. '</td>';
                            echo '<td>' .$autor_id. '</td>';
                            echo '<td>' .$anio. '</td>';
                            echo '<td>' .$especialidad. '</td>';
                            echo '<td>' .$editorial. '</td>';
                            echo '<td>' .$url. '</td>';
                        }
                        ?>
                    </tbody>
                </table>
                <a href="agregarlibro.html"><button type="button" class="btn btn-info">Agregar un libro</button></a>
                <a href="eliminarlibro.html"><button type="button" class="btn btn-info">Eliminar un libro</button></a>
                <a href="actualizarlibro.html"><button type="button" class="btn btn-info">Actualizar un libro</button></a>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>