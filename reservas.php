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
            <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3" id="reservas">
                <?php
                    $select = "SELECT * FROM reservas";
                    $query = $conn->query($select);
                    $count = $query->rowCount();
                    if ($count != 0) {
                        foreach ($query as $row) {
                            ?>
                                <script>
                                    var reservas = document.getElementById("reservas");
                                    $.get("controller/reservas.php", function(envio){
                                        var mat = <?php echo $row['cantidad_y_material']; ?>;
                                        var res = JSON.parse(envio);
                                        console.log(res);
                                        for (let i = 0; i < mat.length; i++) {
                                            var idmat = parseInt(mat[i]['id'], 10);
                                            var suma = idmat;
                                            console.log(suma);
                                            console.log(mat[i]['cant']);
                                        }
                                    });
                                </script>
                                <div class='card text-dark bg-light mb-5 col mx-auto' style='max-width: 22rem;'>
                                    <div class='card-header'><?php echo $_SESSION['email']; ?></div>
                                    <div class='card-body' id='reservas'>
                                        <p class='card-text'>Reservado el: <?php echo $row['fecha_inicio']; ?></p>
                                        <h5 class='card-title'>Hora inicio: <?php echo $row['hora_inicio']; ?></h5>
                                        <h5 class='card-title'>Hora fin: <?php echo $row['hora_fin']; ?></h5>
                                        <p class="card-text">Materiales: </p>
                                    </div>
                                </div>
                            <?php
                        }
                    }
                ?>
            </div>
        </div>
    </body>
    </html>