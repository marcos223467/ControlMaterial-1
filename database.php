<?php

    $server = 'https://cmcodenautas.000webhostapp.com';
    $username = 'id18708266_codenautas15';
    $password = 'BOc5j_iwVmx&U+yQ';
    $database = 'id18708266_controlmaterial';

    try{

        $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
    }catch(PDOException $e){
        die('Conexión fallida: ' . $e->getMessage());
    }
?>