<?php

    //En este script vamos a mostrar los datos del usuario logeado
        error_reporting(0);
        session_start(); //Podemos ver si la sesión de un usuario existe

        require 'database.php';

        //Si existe la variable user_id en la sesión:

        if(isset($_SESSION['user_id']))
        {
            $id = $_SESSION['user_id'];
            $email;
            $nombre;
            $apellidos;
            $rol;
            $img;

            $select = "SELECT * FROM usuarios WHERE id ='$id'";
            $query = $conn->query($select);
            $count = $query->rowCount();
            if ($count != 0)
            {
                foreach ($query as $row)
                {
                    $email =  $row['email'];
                    $nombre = $row['nombre'];
                    $apellidos = $row['apellidos'];
                    $rol = $row['rol'];
                    $img = $row['imagen'];
                }
            }
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
        <title>Menú</title>
        <script src="https://kit.fontawesome.com/39f1326549.js" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/190a2c21e5.js" crossorigin="anonymous"></script>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="assets/css/estilo.css">
        <link rel="stylesheet" type="text/css" href="assets/css/avatar.css">

        <!-- JQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    </head>


    <body id="publicaciones-profes" style="display:none; background-color: #efecea; background-size: cover;">

        <?php require('vista/header.php'); ?>
        <input type="hidden" id="id" value="<?php echo $id; ?>"/>
        <input type="hidden" id="nombre" value="<?php echo $nombre; ?>"/>
        <input type="hidden" id="apellidos" value="<?php echo $apellidos; ?>"/>
        <input type="hidden" id="rol" value="<?php echo $rol; ?>"/>
        <input type="hidden" id="email" value="<?php echo $email; ?>"/>
        <input type="hidden" id="img" value="<?php echo $img; ?>"/>
        <div class="container d-flex justify-content-center mt-1">
            <div class="card d-flex justify-content-center mt-1" id="card-user">
                <div class="top-container" id="top-container-user">
                <label class="custom-file-upload" id="lbl">
                    <input type="file" id="imagen"/>
                    <img src="./imagenes/<?php echo $img; ?>" class="img-fluid profile-image" width="50">
                    <button type="button" class="btn" id="btn2"><i class="fa-solid fa-arrow-up-from-bracket"></i></button>
                </label> 
                    <div class="ml-3" id="data-user">
                        <h5 class="name mb-3"><?php echo $email; ?></h5>
                    </div>
                    <a class="" href="controller/logout.php" style="margin-left: 15px; text-decoration: none; color: grey; font-size: 14px">Salir</a>
                </div>
            </div>
        </div>
        <br><br>
        <div class="container">
            <div class="tarjeta">

                <a href="reservas.php"><div class="card mx-auto" style="background-color: #ff6b10; height:120px;">
                    <div class="card-header">
                        <h3><i class="fas fa-rocket" style="color: #e6e6e6"></i></h3>
                    </div>
                    <div class="card-body">

                        <h5 class="card-title" style="font-family: 'Roboto', sans-serif; color: #fff;">Reservar material</h5>
                        
                    </div>
                </a>
            </div>
        </div>

            <!-- ADMIN -->

    <?php 
        if($_SESSION['rol'] == "admin")
        { 
    ?>

            <div class="container cont">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
                    <div class="container-img" id="tag">
                        <a href="altaUser.php" style="text-decoration:none; color:#000;">
                            <div class="card card-access">
                                <div class="card-body" style="text-align:center">
                                    <h5 class="card-title">Alta Usuario</h5>
                                    <h1 class="card-text"><i class="fas fa-solid fa-user" style="color: #000000"></i></h1>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="container-img" id="tag">
                        <a href="altaMaterial.php" style="text-decoration:none; color:#000;">
                            <div class="card card-access">
                                <div class="card-body" style="text-align:center">
                                    <h5 class="card-title">Alta Material</h5>
                                    <h1 class="card-text"><i class="fas fa-solid fa-tablet" style="color: #000000"></i></h1>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="container-img" id="tag">
                        <a href="listaUser.php" style="text-decoration:none; color:#000;">
                            <div class="card card-access">
                                <div class="card-body" style="text-align:center">
                                    <h5 class="card-title">Usuarios</h5>
                                    <h1 class="card-text"><i class="fa-solid fa-user-gear" style="color: #000000"></i></h1>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="container-img" id="tag">
                        <a href="listaMaterial.php" style="text-decoration:none; color:#000;">
                            <div class="card card-access">
                                <div class="card-body" style="text-align:center">
                                    <h5 class="card-title">Ver Material</h5>
                                    <h1 class="card-text"><i class="fa-solid fa-gear" style="color: #000000"></i></h1>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
    <?php
        }
        else
        {
            require('../vista/acceso_denegado.php');  
        }
        require('vista/footer.php');
    ?>
        <script src="./js/editarUsuario.js"></script>
        <script type="text/javascript" src="js/fade.js"></script>


        <!-- Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>