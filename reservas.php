<?php

    //En este script vamos a mostrar los datos del usuario logeado
        error_reporting(0);
        session_start(); //Podemos ver si la sesión de un usuario existe

        require 'database.php';

        //Si existe la variable user_id en la sesión:

        if(isset($_SESSION['user_id']))
        {
            echo "<script> console.log('Hay sesion') </script>";
        }
        else
        {
            echo "<script> console.log('No hay sesion') </script>";
            header("location: index.php");
        }


?>

    <!DOCTYPE html>
    <html>
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon"/>
        <title>Reservar</title>
        <script src="https://kit.fontawesome.com/39f1326549.js" crossorigin="anonymous"></script>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="assets/css/estilo.css">
        <link rel="stylesheet" type="text/css" href="assets/css/avatar.css">

        <!-- JQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    </head>
    <body id="body-reservas" style="background-color: #26262c; background-size: cover;">
        <div id="top-reservas">
            <a href="menu.php">Volver</a><br>
            <i class="fas fa-solid fa-laptop"></i>
            <h2>Reserva de material</h2>
            <button type="button" class="btn btn-secondary" onclick="window.location='reservar.php'">Reservar material</button>
        </div>
        <div>
            <table class="table table-secondary tabla-reservas">
                <tr><td>prueba@prueba.com</td></tr>
                <tr><td>Reservado el 07/03/2022 <br> <b>10/03/2022</b> <br> ...</td></tr>
                <tr><td>Hora inicio 12:00 Hora fin 17:00</td></tr>
            </table>
        </div>
    </body>
    </html>