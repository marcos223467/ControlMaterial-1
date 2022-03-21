<?php
    require '../database.php';

    if($_POST['categoria'] != "" && $_POST['descripcion'] != "" && $_POST['cantidad'] != 0 && $_POST['id'] != "" && $_POST['imagen'] != "")
    {
        $id = $_POST['id'];
        $cat = $_POST['categoria'];
        $desc = $_POST['descripcion'];
        $cant = $_POST['cantidad'];
        $img = $_POST['imagen'];

        $update = "UPDATE material SET descripcion = '$desc', categoria = '$cat', cantidad = '$cant', imagen = '$img' WHERE id = '$id'";
        $stmt = $conn->prepare($update);

        if($stmt->execute()){
            $data = array('descripcion' => $desc, 'cantidad' => $cant, 'categoria' => $cat, 'imagen' => $img);
            echo json_encode($data);
        }
    }
?>