<?php
    require 'database.php';
    error_reporting(0);
    session_start();

    $ids = array();
    $descripcion = array();
    $cantidad = array();
    $categoria = array();
    $img = array();
    $select = "SELECT * FROM material";
    $query = $conn->query($select);
    $count = $query->rowCount();
    if ($count != 0)
    {
        foreach ($query as $row)
        {
            array_push($ids, $row['id']);
            array_push($descripcion, $row['descripcion']);
            array_push($cantidad, $row['cantidad']);
            array_push($categoria, $row['categoria']);
            array_push($img, $row['imagen']);
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
    <body style=" background-color: #efecea; background-size: cover;">
        <?php require('vista/header.php'); ?>
        <div>
            <button type="button" class="btn btn-light" onclick="volver(event)">Volver</button>
        </div>
        <br>
        <div class="table-responsive">
            <table class="table table-hover" style=" background-color: #efecea;">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col"></th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Categoria</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        for($i = 0; $i < $count; $i++)
                        {
                            echo "<tr>";
                            echo "<th scope='row'>"; echo$i+1; echo "</th>";
                            echo "<td>"; echo "<img src='imagenes/$img[$i]' class='rounded float-start' width='150' alt=''></img>"; echo "</td>";
                            echo "<td>"; echo $descripcion[$i]; echo "</td>";
                            echo "<td>"; echo $cantidad[$i]; echo "</td>";
                            echo "<td>"; echo $categoria[$i]; echo "</td>";
                            echo "<td>"; echo "<a href='editarMaterial.php?id=$ids[$i]' style='font-size: 30px; text-align: center;'>     <i id='adm-i' class='fa-solid fa-pen-to-square'></i></a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>

        <footer class="page-footer font-small" id="footer-general">
            <div class="container text-center py-3">
            <span class="text-muted"><a href="https://auca.es/" style="">Codenautas - Auca Projectes Educatius</a> © 2021</span>
            </div>
        </footer> 
</html>