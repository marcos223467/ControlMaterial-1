<?php
    require '../database.php';
    session_start();

    $select = "SELECT categoria FROM material";
    $query = $conn->query($select);
    $count = $query->rowCount();
    $envio = array();
    if ($count != 0) {
        foreach ($query as $row) {
            array_push($envio, $row['categoria']);
        }
    }
    echo json_encode($envio);
?>