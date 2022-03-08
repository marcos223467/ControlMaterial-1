<?php
    require 'database.php';
    error_reporting(0);
    session_start();

    $usuarios;
    $select = "SELECT * FROM usuarios";
    $query = mysqli_query($conn, $select);

    if(mysqli_num_rows($query) > 0)
    {
        while ($usuarios = mysqli_fetch_assoc($query)) {
            echo $usuarios['email'];
        }
        
    }
    else
    {
        $usuarios = 0;
    }
?>