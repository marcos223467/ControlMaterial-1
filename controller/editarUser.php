<?php
    require '../database.php';
    
    if($_POST['nombre'] != "" && $_POST['apellidos'] != "" && $_POST['email'] != "" && $_POST['rol'] != "" && $_POST['id'] != "")
    {
        $id = $_POST['id'];
        $email = $_POST['email'];
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $rol = $_POST['rol'];

        $update = "UPDATE usuarios SET nombre = '$nombre', apellidos = '$apellidos',  email = '$email', rol = '$rol' WHERE id = '$id'";
        $stmt = $conn->prepare($update);

        if($stmt->execute()){
            $data = array('nombre' => $nombre, 'apellidos' => $apellidos, 'email' => $email, 'rol' => $rol);
            echo json_encode($data);
        }
    }
?>