<?php
    require 'database.php';
    error_reporting(0);
    session_start();

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
                        echo "<button class='btn' aria-hidden='true' data-bs-toggle='modal' data-bs-target='$i'>";
                        echo "<tr>";
                        echo "<th scope='row'>"; echo$i+1; echo "</th>";
                        echo "<td>"; echo $nombres[$i]; echo "</td>";
                        echo "<td>"; echo $apellidos[$i]; echo "</td>";
                        echo "<td>"; echo $email[$i]; echo "</td>";
                        echo "<td>"; echo $rol[$i]; echo "</td>";
                        echo "<td>"; echo "<a href='#'><i id='adm-i' class='fa-solid fa-pen-to-square'></i></a>";
                        echo "<button class='btn' aria-hidden='true' data-bs-toggle='modal' data-bs-target='myModal'><i id='dm-i' class='fa-solid fa-trash-can'></i></button>";
                        echo "</td>";
                        echo "</tr>";
                        echo "</button>";
                    }
                ?>
            </tbody>
        </table>

        <!--<div className="modal fade" id="myModal" tabIndex="-1" role="dialog">
            <div className="modal-dialog" role="document">
                <div className="modal-content">
                    <div className="modal-header">
                        <button id="cerrar" type="button" className="btn-close" data-bs-dismiss="modal"  aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 id="titulo" className="modal-title">Eliminar usuario</h4>
                    </div>
                    <div className="modal-body">
                        <p>¿Estás seguro de querer eliminar este usuario?</p>
                    </div>
                    <div className="modal-footer">
                        <button id="eliminar" type="button" className="btn btn-default" 
                                data-dismiss="modal">Eliminar</button>
                    </div>
                </div>
            </div>
        </div>-->
        <?php require('vista/footer.php'); ?>
    </body>
</html>