<?php
    
    error_reporting(0);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">

        <!-- JQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    </head>
    <body id="publicaciones-profes" style="display:none; background-color: #26262c; background-size: cover;">

        <?php require 'vista/header.php'  ?>

        <?php if(!empty($message)): ?>
        <p style="color: #ff6b10"><?= $message ?></p>
        <?php endif; ?>

        <div class="card col-md-4 mx-auto border-secondary" style="margin-top: 110px">
            <div class="card-header" style="background-color: #26262c">
                <h3 style="color: #ff6b10">Acceso Profesores/as</h3>
            </div>

            <div class="card-body">

                <form action="./controller/loginUser.php" method="post">

                    <div class="mb-3">
                        <input class="form-control" type="text" name="email" placeholder="Introduce tu email">
                    </div>

                    <div class="mb-3">
                        <input class="form-control" type="password" name="password" placeholder="Introduce tu contraseña">
                    </div>

                    <div class="form-group d-grid gap-2">
                        <input class="form-control btn btn-dark" style="background-color: #ff6b10; color: #26262c;" type="submit" value="Acceder">
                    </div>
                    
                </form>

            </div>

        </div>

        <!--<?php require 'vista/footer.php'  ?>-->

        <script type="text/javascript" src="js/fade.js"></script>

    </body>
</html>