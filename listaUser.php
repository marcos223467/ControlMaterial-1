<?php
    require 'database.php';
    error_reporting(0);
    session_start();

    $ids = array();
    $nombres = array();
    $apellidos = array();
    $email = array();
    $rol = array();
    $select = "SELECT * FROM usuarios";
    $query = $conn->query($select);
    $count = $query->rowCount();
    if ($count != 0)
    {
        foreach ($query as $row)
        {
            array_push($ids, $row['id']);
            array_push($nombres, $row['nombre']);
            array_push($apellidos, $row['apellidos']);
            array_push($email, $row['email']);
            array_push($rol, $row['rol']);
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
        <script src="https://kit.fontawesome.com/190a2c21e5.js" crossorigin="anonymous"></script>
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
        <div class="table-responsive">
            <table class="table table-hover" style=" background-color: white;">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Email</th>
                    <th scope="col">Rol</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        for($i = 0; $i < $count; $i++)
                        {
                            echo "<tr>";
                            echo "<th scope='row'>"; echo$i+1; echo "</th>";
                            echo "<td>"; echo $nombres[$i]; echo "</td>";
                            echo "<td>"; echo $apellidos[$i]; echo "</td>";
                            echo "<td>"; echo $email[$i]; echo "</td>";
                            echo "<td>"; echo $rol[$i]; echo "</td>";
                            echo "<td>"; echo "<a href='editar_usuario.php?id=$ids[$i]'><i id='adm-i' class='fa-solid fa-pen-to-square'></i></a>";
                            echo "<button class='btn' data-toggle='modal' data-target='#eliminar<?php echo $i; ?>'><i id='dm-i' class='fa-solid fa-trash-can'></i></button>";
                            echo "</td>";
                            echo "</tr>";
                            echo "<div class='modal fade' id='eliminar<?php echo $i; ?>' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>";
                            echo "<div class='modal-dialog' role='document'>";
                            echo  "<div class='modal-content'>";
                            echo    "<div class='modal-header'>";
                            echo        "<h4 class='modal-title'>";
                            echo            "Eliminar Usuario";
                            echo        "</h4>";
                            echo    "</div>";
                        
                            echo   "<div class='modal-body'>";
                            echo     "<strong style='text-align: center !important'>"; 
                            echo       "alguien";
                                
                            echo      "</strong>";
                            echo    "</div>";
                                
                            echo    "<div class='modal-footer'>";
                            echo      "<button type='button' class='btn btn-default' data-dismiss='modal'>Cerrar</button>";
                            echo      "<button type='submit' class='btn btn-danger btnBorrar' data-dismiss='modal' id='<?php echo $i; ?>'>Borrar</button>";
                            echo    "</div>";
                                
                            echo    "</div>";
                            echo  "</div>";
                            echo "</div>";
                        }
                    ?>
                </tbody>
            </table>
        </div>

        <?php require('vista/footer.php'); ?>
    </body>
</html>