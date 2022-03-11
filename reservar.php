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


        <script>
            $(document).ready(function(){

                categoria();
                cantidad();
                $("#cant").hide();
                $("#mas").hide();
                mat.style.setProperty("width", "18rem");

            });

            function categoria(){

                const mat = document.createElement('select');
                mat.id='mat';
                mat.name='mat';
                mat.className='mb-1';
                mat.style.setProperty("width", "14rem");
                mat.style.setProperty("margin-right", "0.3rem");
                $("#selects").append(mat);

                $.ajax({
                    url:"controller/buscarMat.php",
                    type:"POST",

                    success: function(envio){
                        let envio1 = envio.replace( /\[|\]|\"/gi , "," );
                        let array = envio1.split(',');
                        let data = array.filter(Boolean);
                        console.log(data);
                    },
                });

                document.getElementById('select');
                var otromatopt = document.createElement('option');
                otromatopt.value='<?php echo $id; ?>';
                otromatopt.innerHTML = '<?php echo $categoria; ?>';
                $("#mat").append(otromatopt);

            };

            function cantidad(){

                const cant = document.createElement('select');
                cant.id='cant';
                cant.name='cant';
                cant.className='mb-1';
                cant.style.setProperty("width", "4rem");
                $("#selects").append(cant);

                var valMaterial = $("#mat").val();

                $.ajax({
                    url:"controller/buscarCant.php",
                    type:"POST",
                    data:{
                        id: valMaterial,
                    },
                    success: function(cant){
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
            };

            function cambio(){
                var material = document.getElementById('mat');
                var cantidad = document.getElementById('cant');

                if ($('#mat').val() != "0") {
                    $("#cant").show();
                    $("#mas").show();
                    material.style.setProperty("width", "14rem");
                    cantidad.style.setProperty("width", "4rem");
                    cantidad();
                } else {
                    $("#cant").hide();
                    $("#mas").hide();
                    material.style.setProperty("width", "18rem");
                }
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
            <p class="card-text" id="selects"></p>
            <button type="button" class="btn btn-success mb-3" id="mas"><i class="fas fa-thin fa-plus"></i></button><br>
            <button class="btn btn-dark" type="button" id="btn">Reservar</button>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="./js/reservar.js"></script>
    </div>   
    </body>