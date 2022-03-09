<?php


?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon"/>
        <title>Menú</title>
        <script src="https://kit.fontawesome.com/39f1326549.js" crossorigin="anonymous"></script>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="assets/css/estilo.css">
        <link rel="stylesheet" type="text/css" href="assets/css/avatar.css">

        <!-- JQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <script>
            function volver(event)
            {
                event.preventDefault();
                window.location.href="menu.php";
            }
        </script>

    </head>
    <body style=" background-color: #26262c; background-size: cover;">
        <?php require('vista/header.php'); ?>
        <div>
            <button type="button" class="btn btn-light" onclick="volver(event)">Volver</button>
        </div>
        <br>
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="alertG">
            Material registrado con éxito!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alertB">
            El material no se ha podido registrar!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <div class="container">
            <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 g-3">
                <div class="col">
                    <div class="card" style="width: 20rem; display: block; margin: 0 auto;">
                        <div class="card-header">
                            Alta de Material
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <label class="form-label">Categoria</label>
                                <select class="form-select" style="text-align: center;" id="categoria">
                                    <option value="">--Elegir Categoria--</option>
                                    <option value="legos">Caja de Lego</option>
                                    <option value="juegos_logica">Juegos de lógica</option>
                                    <option value="kit_robotica">Kit de Robótica</option>
                                    <option value="tablet">Tablet</option>
                                    <option value="ordenador_portatil">Ordenador Portatil</option>
                                    <option value="robot">Robot</option>
                                    <option value="varios">Varios</option>
                                </select>
                            </li>
                            <li class="list-group-item">
                                <label class="form-label">Descripción</label>
                                <input type="text" id="descripcion" class="form-control"/>
                            </li>
                            <li class="list-group-item">
                                <label class="form-label">Cantidad</label>
                                <input type="number" class="form-control" id="cantidad"/>
                            </li>
                            <li class="list-group-item">
                                <label class="form-label">Imagen</label>
                                <input class="form-control form-control-sm" type="file" id="imagen">
                            </li>
                            <li class="list-group-item">
                                <button type="button" class="btn btn-primary" id="btn">Registar</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="./js/insertarMaterial.js"></script>
        <br>

        <?php require('vista/footer.php'); ?>
    </body>
</html>