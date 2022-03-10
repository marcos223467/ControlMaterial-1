<?php
    require '../database.php';

    if($_POST['categoria'] != "" && $_POST['descripcion'] != "" && $_POST['cantidad'] != 0 && $_POST['imagen'] !=  "")
    {
        $cat = $_POST['categoria'];
        $desc = $_POST['descripcion'];
        $cant = $_POST['cantidad'];
        $img = $_POST['imagen'];

        $insert = "INSERT INTO material (descripcion, cantidad, categoria, imagen) VALUES (:descripcion, :cantidad, :categoria, :imagen)";
        $stmt = $conn->prepare($insert);
        $stmt->bindParam(':descripcion', $desc);
        $stmt->bindParam(':cantidad', $cant);
        $stmt->bindParam(':categoria', $cat);
        $stmt->bindParam(':imagen', $img);

        if($stmt->execute()){
            $data = array('descripcion' => $desc, 'cantidad' => $cant, 'categoria' => $cat, 'imagen' => $img);
            echo json_encode($data);
        }
    }
?>