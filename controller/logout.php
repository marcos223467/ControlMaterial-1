<?php

    session_start();	//creamos la sesión

    session_unset();	//Eliminamos la sesión

    session_destroy(); 	//Destruimos la sesión

    header('location: ../index.php');	//Redireccionamos al usuario a la página principal


?>