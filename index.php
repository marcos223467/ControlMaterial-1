<?php
    
    error_reporting(0);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="/imagenes/logo_codenautas.png"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="assets/css/estilo.css">

        <!-- JQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    </head>
    <body id="publicaciones-profes" style="display:none; background-color: #efecea; background-size: cover;">

        <?php require 'vista/header.php'  ?>

        <?php if(!empty($message)): ?>
        <p style="color: #ff6b10"><?= $message ?></p>
        <?php endif; ?>

        <main class="container p-5">	
            <div class="row">
                <div class="col-md-4 mx-auto">
                    <div class="card text-center" id="signin-card">
                    
                        <div class="container mt-4 mb-3">
                            <img src="./imagenes/codenautas.png" width="120">
                        </div>
                        <h1 class="h4" style="color: #222222; font-weight: bold;">
                        ACCESO
                        </h1>
                    
                    <div class="card-body">
                        <form action="./controller/loginUser.php" method="POST">
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email" autofocus="" required="">
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Contraseña" required="">
                        </div>
                        <br>
                        <button id="btn-signin" class="btn btn-primary btn-block">
                            Acceder 
                        </button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </main>

        <?php require 'vista/footer.php'  ?>

        <script type="text/javascript" src="js/fade.js"></script>

    </body>
</html>