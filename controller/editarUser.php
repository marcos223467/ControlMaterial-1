<?php
    require '../database.php';
    
    if($_POST['nombre'] != "" && $_POST['apellidos'] != "" && $_POST['email'] != "" && $_POST['rol'] != "" && $_POST['id'] != "" && $_POST['imagen'] != "")
    {
        $id = $_POST['id'];
        $email = $_POST['email'];
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $rol = $_POST['rol'];
        $imagen = $_POST['imagen'];

        $update = "UPDATE usuarios SET nombre = '$nombre', apellidos = '$apellidos',  email = '$email', rol = '$rol', imagen = '$imagen' WHERE id = '$id'";
        $stmt = $conn->prepare($update);

        if($stmt->execute()){
            $data = array('nombre' => $nombre, 'apellidos' => $apellidos, 'email' => $email, 'rol' => $rol, 'imagen' => $imagen);
            echo json_encode($data);
        }
    }
?>