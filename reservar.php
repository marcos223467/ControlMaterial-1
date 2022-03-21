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

                //Variables globales
                var valMaterial = '';
                var cantidades = 0;
                var ids = 0;
                var n = "mat"+ids;
                var y = "cant"+ids;
                var n1 = "#"+n;
                var y1 = "#"+y;
                var fecha = document.getElementById("reserva");
                var horaInicio = document.getElementById("hreserva");
                var horaFin = document.getElementById("hdevolucion");
                var selects = document.getElementById("selects");

                //Funciones (ARREGLAR!!)
                fecha.addEventListener("change", (event) => {
                    if (fecha.value != "" && horaInicio.value != "" && horaFin.value != "") {
                        $("#titulo").show();
                        if (!selects.firstChild) {
                            categoria(valMaterial, cantidades, ids, n, n1, y, y1, fecha, horaInicio, horaFin);
                        }
                    } else {
                        $("#titulo").hide();
                        while (selects.firstChild) {
                            selects.removeChild(selects.firstChild);
                        }
                    }
                });
                horaInicio.addEventListener("change", (event) => {
                    if (fecha.value != "" && horaInicio.value != "" && horaFin.value != "") {
                        $("#titulo").show();
                        if (!selects.firstChild) {
                            categoria(valMaterial, cantidades, ids, n, n1, y, y1, fecha, horaInicio, horaFin);
                        }
                    } else {
                        $("#titulo").hide();
                        while (selects.firstChild) {
                            selects.removeChild(selects.firstChild);
                        }
                    }
                });
                horaFin.addEventListener("change", (event) => {
                    if (fecha.value != "" && horaInicio.value != "" && horaFin.value != "") {
                        $("#titulo").show();
                        if (!selects.firstChild) {
                            categoria(valMaterial, cantidades, ids, n, n1, y, y1, fecha, horaInicio, horaFin);
                        }
                    } else {
                        $("#titulo").hide();
                        while (selects.firstChild) {
                            selects.removeChild(selects.firstChild);
                        }
                    }
                });

                //Añadir material
                const mas = document.getElementById("mas");
                function click(){
                    ids = ids+1;
                    n = "mat"+ids;
                    y = "cant"+ids;
                    n1 = "#"+n;
                    y1 = "#"+y;
                    categoria(valMaterial, cantidades, ids, n, n1, y, y1, fecha, horaInicio, horaFin);
                };
                mas.onclick = click;

                //Estilo
                $("#mas").hide();
                $("#titulo").hide();

            });

            function categoria(valMaterial, cantidades, ids, n, n1, y, y1, fecha, horaInicio, horaFin){

                //Crear select materiales
                var mat = document.createElement('select');

                mat.id = n;
                mat.name = n;
                mat.className = 'mb-1';
                mat.style.setProperty("width", "18rem");
                $("#selects").append(mat);

                //Crear select cantidades
                var cant = document.createElement('select');

                cant.id = y;
                cant.name = y;
                cant.className='mb-1';
                cant.style.setProperty("width", "4rem");
                $("#selects").append(cant);
                $(y1).hide();

                //Variables de objetos
                var categoria = document.getElementById(n);

                //Consulta materiales
                $.ajax({
                    url:"controller/buscarMat.php",
                    type:"POST",
                    data:{
                        fecha: fecha.value,
                        horaInicio: horaInicio.value,
                        horaFin: horaFin.value,
                    },

                    success: function(envio){
                        console.log(envio)
                        let envio1 = envio.replace( /\[|\]|\"/gi , "," );
                        let array = envio1.split(',');
                        let data = array.filter(Boolean);

                        var matopt1 = document.createElement('option');
                        matopt1.value = "";
                        matopt1.innerHTML = "-- Elije un material --";
                        categoria.append(matopt1);
                        
                        for( let i = 0; i < data.length; i++){
                            if( i%2 == 0 ){
                                var matopt = document.createElement('option');
                                matopt.value = data[i];
                            } else {
                                matopt.innerHTML = data[i];
                            };
                            categoria.append(matopt);
                        };
                    },
                });                

                //Evento cambio de material
                mat.addEventListener('change', (event) => {
                    valMaterial = $(n1).val();
                    if ( valMaterial == "" ) {
                        $(y1).hide();
                        $("#mas").hide();
                        mat.style.setProperty("width", "18rem");
                        mat.style.setProperty("margin-right", "0rem");
                    } else {
                        $("#mas").show();
                        $(y1).show();
                        mat.style.setProperty("width", "13.7rem");
                        mat.style.setProperty("margin-right", "0.3rem");
                        
                        cantidad(valMaterial, cantidades, ids, n, n1, y, y1);
                    }
                });
            };

            function cantidad(valMaterial, cantidades, ids, n, n1, y, y1){

                //Variable de objeto

                $.ajax({
                    url:"controller/buscarCant.php",
                    type:"POST",
                    data:{
                        id: valMaterial,
                    },
                    success: function(can){
                        cantidades = can;
                        var cantidad1 = document.getElementById(y)

                        while (cantidad1.firstChild) {
                            cantidad1.removeChild(cantidad1.firstChild);
                        }
                        if (can == 0) {
                            var option = document.createElement("option");
                            option.value = 0;
                            option.innerHTML = "N/D";
                            cantidad1.appendChild(option);
                        } else {
                            for (let index = 1; index <= can; index++) {
                                var option = document.createElement("option");
                                option.value = index;
                                option.innerHTML = index;
                                cantidad1.appendChild(option);
                            }
                        }
                    },
                });
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
            <p class="card-text" id="titulo">Elije material y cantidad:</p>
            <div class="card-text" id="selects"></div>
            <button type="button" class="btn btn-success mb-3" id="mas" onclick="categoria(valMaterial, cantidades)"><i class="fas fa-thin fa-plus"></i></button><br>
            <button class="btn btn-dark" type="button" id="btn">Reservar</button>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="./js/reservar.js"></script>
    </div>   
    </body>