<?php
    require 'database.php';
    error_reporting(0);
    session_start();

    $id = $_GET["id"];
    
    $select = "SELECT * FROM usuarios WHERE id = '$id'";
    $query = $conn->query($select);
    $count = $query->rowCount();
    if ($count != 0)
    {
        foreach ($query as $row)
        {
            $nombre =  $row['nombre'];
            $apellidos = $row['apellidos'];
            $email = $row['email'];
            $rol = $row['rol'];
            
        }

        
    }
?>

<!DOCTYPE html>
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
                window.location.href="listaUser.php";
            }
        </script>

    </head>
    <body style=" background-color: #26262c; background-size: cover;">
        <?php require('vista/header.php'); ?>

        <div>
            <button type="button" class="btn btn-light" onclick="volver(event)">Volver</button>
        </div>
        <br>
        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alertB">
            El usuario no se ha podido editar!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 g-3">
                <div class="col">
                    <div class="card" style="width: 20rem; display: block; margin: 0 auto;">
                        <div class="card-header">
                                Editar Usuario
                        </div>
                        <input id="id" type="hidden" value="<?php echo $id;?>"/>
                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" required style="width: 15rem; display: block; margin: 0 auto;" value="<?php echo $nombre; ?>"/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Apellidos</label>
                            <input type="text" class="form-control" id="apellidos" required style="width: 15rem; display: block; margin: 0 auto;" value="<?php echo $apellidos; ?>"/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" id="email" required style="width: 15rem; display: block; margin: 0 auto;" value="<?php echo $email; ?>"/>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Rol</label>
                            <select class="form-select" style="text-align: center; width: 15rem; display: block; margin: 0 auto;" id="rol" required>
                                <?php
                                    if($rol == "admin")
                                    {
                                        echo "<option value='admin' selected> Administrador </option>";
                                        echo "<option value=profe> Profesor </option>";
                                    }
                                    else
                                    {
                                        echo "<option value='admin'> Administrador </option>";
                                        echo "<option value=profe selected> Profesor </option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <button type="button" class="btn btn-primary" id="btn">Editar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="./js/editarUsuario.js"></script>
        <br>
        <?php require('vista/footer.php'); ?>

        <script type="text/javascript" src="js/fade.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>