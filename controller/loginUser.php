<?php

    require '../database.php';
    if($_POST['email'] != "" && $_POST['password'] != "")
    {
        //Recojemos las variables y comprobamos que existe en la base de datos
        $email = $_POST['email'];
        $pssw = $_POST['password'];

		$select = "SELECT * FROM usuarios WHERE email = '$email'";
		$query = $conn->query($select);
		$count = $query->rowCount();
		if ($count != 0)
		{
			foreach ($query as $row)
			{
				if ($row['password'] == $pssw)
				{
					session_start();
					$_SESSION["user_id"] = $row['id'];
					$_SESSION["email"] = $row['email'];
					$_SESSION["rol"] = $row['rol'];
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
    }
    else
    {
        header('location: ../index.php');
    }
?>