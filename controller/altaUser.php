<?php
    require '../database.php';
    
    if($_POST['nombre'] != "" && $_POST['apellidos'] != "" && $_POST['email'] != "" && $_POST['pssw'] != "" && $_POST['rol'] != "")
    {
        $email = $_POST['email'];
        $pssw = $_POST['pssw'];
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $rol = $_POST['rol'];

        $insert = "INSERT INTO usuarios (nombre, apellidos, email, password, rol) VALUES (:nombre, :apellidos, :email, :password, :rol)";
        $stmt = $conn->prepare($insert);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellidos', $apellidos);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $pssw);
        $stmt->bindParam(':rol', $rol);

        if($stmt->execute()){
            $data = array('nombre' => $nombre, 'apellidos' => $apellidos, 'email' => $email, 'password' => $pssw, 'rol' => $rol);
            echo json_encode($data);
        }
    }
?>