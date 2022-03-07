<?php

    $server = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'material';

    $conn = mysqli_connect($server, $username, $password, $database) or die("No se conecta " . mysqli_connect_error());

?>