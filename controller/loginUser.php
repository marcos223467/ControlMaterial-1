<?php

    require '../database.php';
    if($_POST['email'] != "" && $_POST['password'] != "")
    {
        //Recojemos las variables y comprobamos que existe en la base de datos
        $email = $_POST['email'];
        $pssw = $_POST['password'];

		$select = "SELECT * FROM usuarios WHERE email = '$email'";
		$query = mysqli_query($conn, $select);

		if(mysqli_num_rows($query) == 0)
		{
			header('location: ../index.php');
		}
		else
		{
			$fila = mysqli_fetch_assoc($query);

			if($fila['password'] == $pssw)
			{
				session_start();
				$_SESSION["user_id"] = $fila['id'];
				$_SESSION["email"] = $fila['email'];
				$_SESSION["rol"] = $fila['rol'];
				header('location: ../menu.php');
			}
			else
			{
				header('location: ../index.php');
			}
		}
    }
    else
    {
        header('location: ../index.php');
    }
?>