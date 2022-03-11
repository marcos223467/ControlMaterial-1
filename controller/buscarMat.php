<?php

    require '../database.php';
    session_start();

    $ins = "SELECT id, categoria FROM material";
    $query = $conn->query($ins);
    $count = $query->rowCount();
    if ($count != 0) {
        foreach ($query as $row) {
            $id = intval($row['id']);
            $categoria = $row['categoria'];
            $envio = array('id' => $id, 'categoria' => $categoria);
            echo json_encode($envio);
        }
    }

?>