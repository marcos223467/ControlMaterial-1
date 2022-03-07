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

    </head>
    <body style=" background-color: #26262c; background-size: cover;">
        <?php require('vista/header.php'); ?>

        <div class="container" style="width: 50%; background-color: whitesmoke; border-radius: 15px; margin-top: 5%;">
            <form>
                <fieldset>
                    <legend style="color: black">Alta de Usuario</legend>
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control"/>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellidos</label>
                        <input type="email" class="form-control"/>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="exampleInputEmail1"/>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Rol</label>
                        <input type="text" class="form-control"/>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Registar</button>
                    </div>
                </fieldset>
            </form>
        </div>
        <br><br><br>
        <?php require('vista/footer.php'); ?>

        <script type="text/javascript" src="js/fade.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>