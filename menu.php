<?php

    //En este script vamos a mostrar los datos del usuario logeado
        error_reporting(0);
        session_start(); //Podemos ver si la sesión de un usuario existe

        require 'database.php';

        //Si existe la variable user_id en la sesión:

        if(isset($_SESSION['user_id'])){

            echo "<script> console.log('Hay sesion') </script>";

            //Seleccionamos desde la base de datos los datos del usuario
            $records = $conn->prepare('SELECT id, email, password, rol FROM users WHERE id = :id');

            //Remplazamos el dato id por el recibido por el de la sesión (Vinculamos el dato):
            $records->bindParam(':id', $_SESSION['user_id']);

            //Ejecutamos la consulta
            $records->execute();

            //Obtenemos a través del método FETCH los datos del usuario en un array asociativo:
            $results = $records->fetch(PDO::FETCH_ASSOC);

            $user = null;

            if(count($results) > 0){
                $user = $results;
            }
        }
        else
        {
            echo "<script> console.log('No hay sesion') </script>";
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
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
        <link rel="stylesheet" type="text/css" href="assets/css/avatar.css">

        <!-- JQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    </head>

    <?php /*if(isset($_SESSION['user_id']) && ($user['rol'] == 'A' || $user['rol'] == 'B')){ */?>


    <body id="publicaciones-profes" style="display:none; background-color: #26262c; background-size: cover;">

        <?php require('vista/header.php'); ?>

        

        <!-- Hemos accedido a la app -->

                <br><div class="chip">
                    <span><?= $user['email']; ?></span>
                </div><br><br>
                
                <a href="logout.php">Salir</a>

                <div class="container mb-3" style="margin-top: 2%">
                    
                    
                    
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">

                    <div class="col">

                        <a href="crearPost.php"><div class="card mx-auto" style="background-color: #ff6b10; height:120px;">
                        <div class="card-header">
                            <h3><i class="fas fa-rocket" style="color: #e6e6e6"></i></h3>
                        </div>
                        <div class="card-body">

                            <h5 class="card-title" style="font-family: 'Roboto', sans-serif; color: #fff;">Nueva publicación foto</h5>
                            
                        </div>
                        </div></a>

                    </div>
                    
                    <div class="col">

                        <a href="crearPostVideo.php"><div class="card mx-auto" style="background-color: #ff6b10; height:120px;">
                        <div class="card-header">
                            <h3><i class="fas fa-rocket" style="color: #e6e6e6"></i></h3>
                        </div>
                        <div class="card-body">

                            <h5 class="card-title" style="font-family: 'Roboto', sans-serif; color: #fff;">Nueva publicación vídeo</h5>
                            
                        </div>
                        </div></a>

                    </div>

                    <div class="col">

                        <a href=""><div class="card mx-auto" style="background-color: #ff6b10; height:120px;">
                            <div class="card-header">
                            <h3><i class="fas fa-meteor" style="color: #e6e6e6"></i></h3>
                        </div>
                    
                        <div class="card-body">
                            <h5 class="card-title" style="font-family: 'Roboto', sans-serif; color: #fff; ">Ver publicaciones</h5>
                            
                        </div>
                        </div></a>

                    </div>

                    <div class="col">

                        <a href=""><div class="card mx-auto" style="background-color: #ff6b10; height:120px;">
                            <div class="card-header">
                            <h3><i class="fas fa-satellite" style="color: #e6e6e6"></i></h3>
                        </div>
                    
                        <div class="card-body">
                            <h5 class="card-title" style="font-family: 'Roboto', sans-serif; color: #fff; ">Asistencia</h5>
                            
                        </div>
                        </div></a>

                    </div>

                    <div class="col">

                        <a href=""><div class="card mx-auto" style="background-color: #ff6b10; height:120px;">
                            <div class="card-header">
                            <h3><i class="fas fa-user-astronaut" style="color: #e6e6e6"></i></h3>
                        </div>
                    
                        <div class="card-body">
                            <h5 class="card-title" style="font-family: 'Roboto', sans-serif; color: #fff; ">Logros y Evaluaciones</h5>
                            
                        </div>
                        </div></a>

                    </div>

                    
                    
                    <div class="col">

                        <a href=""><div class="card mx-auto" style="background-color: #ff6b10; height:120px;">
                            <div class="card-header">
                            <h3><i class="fas fa-laptop" style="color: #e6e6e6"></i></h3>
                        </div>
                    
                        <div class="card-body">
                            <h5 class="card-title" style="font-family: 'Roboto', sans-serif; color: #fff; ">Material clases</h5>
                            
                        </div>
                        </div></a>

                    </div>

                    

                </div>
            </div>

            <!-- ADMIN -->

            <?php /*if($user['email'] == 'jorge.perez@somoscodenautas.com' or $user['email'] == 'marga.pertegaz@somoscodenautas.com'){ */?>

            <div class="container mb-3" style="margin-top: 3%">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">

                    <div class="col">

                        <a href=""><div class="card mx-auto" style="background-color: #2484c6; height:120px;">
                        <div class="card-header">
                            <h3><i class="fas fa-space-shuttle" style="color: #e6e6e6"></i></h3>
                        </div>
                        <div class="card-body">

                            <h5 class="card-title" style="font-family: 'Roboto', sans-serif; color: #fff;">Alta profesor/a</h5>
                            
                        </div>
                        </div></a>

                    </div>

                    <div class="col">

                        <a href=""><div class="card mx-auto" style="background-color: #2484c6; height:120px;">
                            <div class="card-header">
                            <h3><i class="fas fa-hand-spock" style="color: #e6e6e6"></i></h3>
                        </div>
                    
                        <div class="card-body">
                            <h5 class="card-title" style="font-family: 'Roboto', sans-serif; color: #fff; ">Alta padre/madre</h5>
                            
                        </div>
                        </div></a>

                    </div>

                    <div class="col">

                        <a href=""><div class="card mx-auto" style="background-color: #2484c6; height:120px;">
                            <div class="card-header">
                            <h3><i class="fas fa-satellite-dish" style="color: #e6e6e6"></i></h3>
                        </div>
                    
                        <div class="card-body">
                            <h5 class="card-title" style="font-family: 'Roboto', sans-serif; color: #fff; ">Comunicados</h5>
                            
                        </div>
                        </div></a>

                    </div>
                    
                    <div class="col">

                        <a href=""><div class="card mx-auto" style="background-color: #2484c6; height:120px;">
                            <div class="card-header">
                            <h3><i class="fas fa-calendar-alt" style="color: #e6e6e6"></i></h3>
                        </div>
                    
                        <div class="card-body">
                            <h5 class="card-title" style="font-family: 'Roboto', sans-serif; color: #fff; ">Ver usuarios</h5>
                            
                        </div>
                        </div></a>

                    </div>

                    

                </div>
            </div>

            <?php /*} */?>



            <!-- <?php require('vista/footer.php'); ?> -->

            <script type="text/javascript" src="js/fade.js"></script>



        <!-- Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
    <?php /*}else{ */?>

        

        <?php /*require('../vista/acceso_denegado.php'); ?>

        

    <?php } */?>
</html>