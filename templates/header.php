<?php

    session_start();
    if (!isset($_SESSION['user'])){
        header('Location: ../index.php');
    }

?>

<!doctype html>
<html lang="en">

<head>
    <title>Cerificados Cursos</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="../favicon.ico">

    <!-- Bootstrap CSS v5.2.1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="../libraries/bootstrap-5.3.0/css/bootstrap.css" /> -->
    <!-- Bootstrap ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" />

</head>

<body>
    <header>
        <nav class="navbar navbar-expand navbar-light bg-light">
            <div class="nav navbar-nav">
                <a class="nav-item nav-link active" href="index.php" aria-current="page">Inicio</a>
                <a class="nav-item nav-link" href="alumnos_view.php">Alumnos</a>
                <a class="nav-item nav-link" href="cursos_view.php">Cursos</a>
                <a class="nav-item nav-link" href="eventos_view.php">Eventos</a>
                <a class="nav-item nav-link" href="cerrar.php">Cerrar sesión</a>
            </div>
        </nav>

    </header>

    <div class="container">
