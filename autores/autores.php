<?php

include('../conexion/conexion.php');

// ---Abrimos la conexion a la base de datos---
$conexion = conectar();

//Consulta la base de datos

$query = $conexion->prepare("SELECT autor_id, nombres, ape_paterno, ape_materno FROM autor");
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
    <title>Autores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body style="background-color:rgb(170, 170, 178)">
    <div class="container">
        <div class="card mt-5 text-center">
            <div class="card-header bg-info text-dark">
                <h1><div>Autores</div></h1>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombres</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($autor = $resultado->fetch_assoc()) {

                            $autor_id = $autor['autor_id'];
                            $nombres = $autor['nombres'];
                            $ape_paterno = $autor['ape_paterno'];
                            $ape_materno = $autor['ape_materno'];

                            echo '<tr>';
                            echo '<td>' .$autor_id. '</td>';
                            echo '<td>' .$nombres. '</td>';
                            echo '<td>' .$ape_paterno. '</td>';
                            echo '<td>' .$ape_materno. '</td>';
                        }
                        ?>
                    </tbody>
                </table>
                <a href="agregarautor.html"><button type="button" class="btn btn-info">Agregar un autor</button></a>
                <a href="eliminarautor.html"><button type="button" class="btn btn-info">Eliminar un autor</button></a>
                <a href="actualizarautor.html"><button type="button" class="btn btn-info">Actualizar un autor</button></a>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>