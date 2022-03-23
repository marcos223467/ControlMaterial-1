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

        $id_reservas = array();
        $fecha_inicio = array();
        $hora_inicio = array();
        $hora_fin = array();
        $cant_mat = array();
        $cant_mat_aux = array();
        $id_user = array();
        $id_material = array();
        $select = "SELECT * FROM reservas";
        $query = $conn->query($select);
        $count = $query->rowCount();
        if ($count != 0)
        {
            foreach ($query as $row)
            {
                array_push($id_reservas, $row['id']);
                array_push($fecha_inicio, $row['fecha_inicio']);
                array_push($hora_inicio, $row['hora_inicio']);
                array_push($hora_fin, $row['hora_fin']);
                array_push($id_user, $row['id_user']);
                foreach(json_decode($row['cantidad_y_material']) as $col => $value)
                {
                    echo "<script> console.log(".$col."); </script>";
                }
            }
        }

        echo "<script> console.log(".$cant_mat[0]."); </script>";
?>

    <!DOCTYPE html>
    <html>
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon"/>
        <title>Reservas</title>
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
            <h2>Reservas actuales</h2>
            <button type="button" class="btn btn-secondary" onclick="window.location='reservar.php'">Reservar material</button>
        </div>
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3">
                <?php
                    for($i = 0; $i < $count; $i++)
                    {
                        $select = "SELECT * FROM usuarios WHERE id = '$id_user[$i]'" ;
                        $query = $conn->query($select);
                        $count2 = $query->rowCount();
                        $email = "";
                        if($count2 != 0)
                        {
                            foreach ($query as $row)
                            {
                                $email = $row['email'];
                            }
                            echo "<div class='card text-dark bg-light mb-5 col mx-auto' style='max-width: 22rem;'>";
                                echo "<div class='card-header'>"; echo $email; echo "</div>";
                                echo "<div class='card-body'>";
                                    echo "<p class='card-text'>Reservado el "; echo $fecha_inicio[$i]; echo "</p>";
                                    echo "<h5 class='card-title'>Hora inicio: "; echo $hora_inicio[$i]; echo "</h5>";
                                    echo "<h5 class='card-title'>Hora fin: "; echo $hora_fin[$i]; echo "</h5>";
                                echo "</div>";
                            echo "</div>";
                        }
                    }
                ?>
            </div>
        </div>
    </body>
    </html>