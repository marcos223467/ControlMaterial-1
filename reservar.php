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

        $select = "SELECT id, categoria FROM material";
        $query = $conn->query($select);

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


        <script>
            $(document).ready(function(){
                $("#cant").hide();
                $("#mas").hide();
                var hojasDeEstilo = document.styleSheets;
                var ultimaHoja = hojasDeEstilo[hojasDeEstilo.length-1];
                ultimaHoja.insertRule("#mat{ width:18rem; }");
            });
            function cambio(){
                var material = document.getElementById('mat');
                var cantidad = document.getElementById('cant');

                if ($('#mat').val() != "0") {
                    $("#cant").show();
                    $("#mas").show();
                    material.style.setProperty("width", "14rem");
                    cantidad.style.setProperty("width", "4rem");
                    var valMaterial = $("#mat").val();
                    console.log(valMaterial);

                    $.ajax({
                        url:"controller/buscarid.php",
                        type:"POST",
                        data:{
                            id: valMaterial,
                        },
                        success: function(cant){
                            console.log(cant);
                            var select = document.getElementById("cant");
                            while (select.firstChild) {
                                select.removeChild(select.firstChild);
                            }
                            for (let index = 1; index <= cant; index++) {
                                var option = document.createElement("option");
                                option.value = index;
                                option.innerHTML = index;
                                select.appendChild(option);
                            }
                        },
                    });
                } else {
                    $("#cant").hide();
                    $("#mas").hide();
                    material.style.setProperty("width", "18rem");
                }
            };
            function otro(){
                var select = document.createElement("select");
                selects.appendChild(select);
                <?php
                    $select1 = "SELECT id, categoria FROM material";
                    $query1 = $conn->query($select1);
                ?>
                id.forEach(<?php $query1 ?> => row{
                    console.log(row);
                });
                var option = document.createElement("option");
                option.value = options;
                option.innerHTML = options;
                select.appendChild(option);
            };
        </script>

    </head>
    <body id="body-reservas" style="background-color: #26262c; background-size: cover;">
    <div id="top-reservas">
        <a href="reservas.php">Volver</a><br>
    </div>
    <div id="top-reservas">
        <i class="fas fa-solid fa-bookmark"></i>
        <h2>Reservar materiales</h2>
    </div>
    <div class="card text-dark bg-light mb-3 col mx-auto" style="max-width: 30rem;">
        <div class="card-body reservar">
            <p class="card-text">Fecha de la reserva:</p>
            <p class="card-text"><input type="date" name="reserva" id="reserva"></p>
            <p class="card-text">Hora de la reserva:</p>
            <p class="card-text"><input type="time" name="hreserva" id="hreserva"></p>
            <p class="card-text">Hora de la devolución:</p>
            <p class="card-text"><input type="time" name="hdevolucion" id="hdevolucion"></p>
            <p class="card-text">Elije material y cantidad:</p>
            <p class="card-text" id="selects">
                <select onchange="cambio()" name="material" id="mat">
                    <option value="0">--Elije el material--</option>
                    <?php
                        $select = "SELECT id, categoria FROM material";
                        $query = $conn->query($select);
                        foreach ($query as $row) {
                            echo "<option value=".$row['id'].">".$row['categoria']."</option>";
                        }
                    ?>
                </select>
                <select name="cantidad" id="cant">
                </select>
            </p>
            <button type="button" class="btn btn-success mb-3" id="mas" onclick="otro()"><i class="fas fa-thin fa-plus"></i></button><br>
            <button class="btn btn-dark" type="button" id="btn">Reservar</button>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="./js/reservar.js"></script>
    </div>   
    </body>