<?php
    require '../database.php';
    
    if($_POST['nombre'] != "" && $_POST['apellidos'] != "" && $_POST['email'] != "" && $_POST['pssw'] != "" && $_POST['rol'] != "" && $_POST['imagen'] !=  "")
    {
        $email = $_POST['email'];
        $pssw = $_POST['pssw'];
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $rol = $_POST['rol'];
        $img = $_POST['imagen'];
        echo "$img";

        $insert = "INSERT INTO usuarios (nombre, apellidos, email, password, rol, imagen) VALUES (:nombre, :apellidos, :email, :password, :rol, :imagen)";
        $stmt = $conn->prepare($insert);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellidos', $apellidos);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $pssw);
        $stmt->bindParam(':rol', $rol);
        $stmt->bindParam(':imagen', $img);

        if($stmt->execute()){
            $data = array('nombre' => $nombre, 'apellidos' => $apellidos, 'email' => $email, 'password' => $pssw, 'rol' => $rol, 'imagen' => $img);
            echo json_encode($data);
        }
    }
?>