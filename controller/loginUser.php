<?php

    require '../database.php';
    if($_POST['email'] != "" && $_POST['password'] != "")
    {
        //Recojemos las variables y comprobamos que existe en la base de datos
        $email = $_POST['email'];
        $pssw = $_POST['password'];
        $records = $conn->prepare('SELECT id, email, password FROM usuarios WHERE email = :email');

		//Remplazamos el dato email por el recibido por el método POST (Vinculamos el dato):
		$records->bindParam(':email', $_POST['email']);

		//Ejecutamos la consulta:
		$records->execute();

		//Obtenemos a través del método FETCH los datos del usuario en un array asociativo:
		$results = $records->fetch(PDO::FETCH_ASSOC);

		$message = '';

		//Comprobamos si tenemos resultados && si la contraseña enviada coincide con la del usuario,
		//Es decir, verificamos si es correcto el usuario y de ser así le creamos la sesión:

		if(count($results) > 0 && password_verify($_POST['password'], $results['password'])){

			//Asignamos en memoria una sesión y almacenamos el id del usuario:
			$_SESSION['user_id'] = $results['id'];

			//Cuando lo tenemos redireccionamos a la página principal:
			header('location: menu.php');

		}
        else{

			//Si no existe el usuario o contraseña:
			$message = 'Lo siento, Las credenciales no coinciden';
		}
    }
    else
    {
        header('location: index.php');
    }
?>