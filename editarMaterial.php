<?php
    require 'database.php';
    error_reporting(0);
    session_start();

    $id = $_GET["id"];
    
    $select = "SELECT * FROM material WHERE id = '$id'";
    $query = $conn->query($select);
    $count = $query->rowCount();
    if ($count != 0)
    {
        foreach ($query as $row)
        {
            $descripcion =  $row['descripcion'];
            $cantidad = $row['cantidad'];
            $categoria = $row['categoria'];
            $img = $row['imagen'];            
        }

        
    }
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

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        
        <script>
            function volver(event)
            {
                event.preventDefault();
                window.location.href="listaMaterial.php";
            }
        </script>
        <script>
            function Eliminar()
            {
                let id = <?php echo $id ?>;
                $.ajax({
                    url:"controller/eliminarMaterial.php",
                    type: "POST",
                    data:
                    {
                        id: id
                    },
                    success: function(data)
                    {
                        setTimeout(function(){
                            window.location.href="listaMaterial.php";
                        }, 500);
                    },
                    error: function()
                    {
                        setTimeout(function(){
                            $("#alertB").show();
                        }, 500);
                    }   
                });
            }
        </script>

    </head>
    <body style=" background-color: #efecea; background-size: cover;">
        <?php require('vista/header.php'); ?>
        <div>
            <button type="button" class="btn btn-light" onclick="volver(event)">Volver</button>
        </div>
        <br>
        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alertB">
            El material no se ha podido registrar!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <div class="container">
            <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 g-3">
                <div class="col">
                    <div class="card" id="input-card" style="display: block; margin: 0 auto;">
                        <form enctype="multipart/form-data" id="subidaImagen" method="post">
                            <div class="card-header">
                                <h5>Editar Material<h5>
                                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-solid fa-trash-can"></i></button>
                            </div>
                            <input id="id" type="hidden" value="<?php echo $id ?>"/>
                            <input id="img" type="hidden" value="<?php echo $img ?>"/>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <label class="form-label">Categoria</label>
                                    <select class="form-select" style="text-align: center;" id="categoria">
                                        <?php
                                            switch($categoria)
                                            {
                                                case "legos":
                                                    echo "<option value='legos' selected>Caja de Lego</option>";
                                                    echo "<option value='juegos_logica'>Juegos de lógica</option>";
                                                    echo "<option value='kit_robotica'>Kit de Robótica</option>";
                                                    echo "<option value='tablet'>Tablet</option>";
                                                    echo "<option value='portatil'>Ordenador Portatil</option>";
                                                    echo "<option value='robot'>Robot</option>";
                                                    echo "<option value='varios'>Varios</option>";
                                                    break;
                                                case "juegos_logica":
                                                    echo "<option value='legos'>Caja de Lego</option>";
                                                    echo "<option value='juegos_logica' selected>Juegos de lógica</option>";
                                                    echo "<option value='kit_robotica'>Kit de Robótica</option>";
                                                    echo "<option value='tablet'>Tablet</option>";
                                                    echo "<option value='portatil'>Ordenador Portatil</option>";
                                                    echo "<option value='robot'>Robot</option>";
                                                    echo "<option value='varios'>Varios</option>";
                                                    break;
                                                case "kit_robotica":
                                                    echo "<option value='legos'>Caja de Lego</option>";
                                                    echo "<option value='juegos_logica'>Juegos de lógica</option>";
                                                    echo "<option value='kit_robotica' selected>Kit de Robótica</option>";
                                                    echo "<option value='tablet'>Tablet</option>";
                                                    echo "<option value='portatil'>Ordenador Portatil</option>";
                                                    echo "<option value='robot'>Robot</option>";
                                                    echo "<option value='varios'>Varios</option>";
                                                    break;
                                                case "tablet":
                                                    echo "<option value='legos'>Caja de Lego</option>";
                                                    echo "<option value='juegos_logica'>Juegos de lógica</option>";
                                                    echo "<option value='kit_robotica'>Kit de Robótica</option>";
                                                    echo "<option value='tablet' selected>Tablet</option>";
                                                    echo "<option value='portatil'>Ordenador Portatil</option>";
                                                    echo "<option value='robot'>Robot</option>";
                                                    echo "<option value='varios'>Varios</option>";
                                                    break;
                                                case "portatil":
                                                    echo "<option value='legos'>Caja de Lego</option>";
                                                    echo "<option value='juegos_logica'>Juegos de lógica</option>";
                                                    echo "<option value='kit_robotica'>Kit de Robótica</option>";
                                                    echo "<option value='tablet'>Tablet</option>";
                                                    echo "<option value='portatil' selected>Ordenador Portatil</option>";
                                                    echo "<option value='robot'>Robot</option>";
                                                    echo "<option value='varios'>Varios</option>";
                                                    break;
                                                case "robot":
                                                    echo "<option value='legos'>Caja de Lego</option>";
                                                    echo "<option value='juegos_logica'>Juegos de lógica</option>";
                                                    echo "<option value='kit_robotica'>Kit de Robótica</option>";
                                                    echo "<option value='tablet'>Tablet</option>";
                                                    echo "<option value='portatil'>Ordenador Portatil</option>";
                                                    echo "<option value='robot' selected>Robot</option>";
                                                    echo "<option value='varios'>Varios</option>";
                                                    break;
                                                case "varios":
                                                    echo "<option value='legos'>Caja de Lego</option>";
                                                    echo "<option value='juegos_logica'>Juegos de lógica</option>";
                                                    echo "<option value='kit_robotica'>Kit de Robótica</option>";
                                                    echo "<option value='tablet'>Tablet</option>";
                                                    echo "<option value='portatil'>Ordenador Portatil</option>";
                                                    echo "<option value='robot'>Robot</option>";
                                                    echo "<option value='varios' selected>Varios</option>";
                                                    break;
                                            }
                                        ?>
                                    </select>
                                </li>
                                <li class="list-group-item">
                                    <label class="form-label">Descripción</label>
                                    <input type="text" id="descripcion" class="form-control" value="<?php echo $descripcion?>"/>
                                </li>
                                <li class="list-group-item">
                                    <label class="form-label">Cantidad</label>
                                    <input type="number" class="form-control" id="cantidad" value="<?php echo $cantidad?>"/>
                                </li>
                                <li class="list-group-item">
                                    <label class="form-label custom-file-upload">
                                        Imagen
                                        <input class="form-control form-control-sm" type="file" id="imagen">
                                        <i class="fa-solid fa-arrow-up-from-bracket"></i>
                                    </label>
                                </li>
                                <li class="list-group-item">
                                    <button type="button" class="btn btn-primary" id="btn">Editar</button>
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--MODAL-->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Eliminar Material</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ¿Estás seguro de querer eliminar este material?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" onclick="Eliminar()">Eliminar</button>
                </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="./js/editarMaterial.js"></script>
        <br>

        <footer class="page-footer font-small" id="footer-general">
            <div class="container text-center py-3">
            <span class="text-muted"><a href="https://auca.es/" style="">Codenautas - Auca Projectes Educatius</a> © 2021</span>
            </div>
        </footer> 
    </body>
</html>