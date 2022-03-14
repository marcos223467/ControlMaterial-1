<?php

    require '../database.php';
    session_start();

    if ($_POST['id'] != "") {
        $id = $_POST['id'];

        $ins = "SELECT cantidad FROM material WHERE id = '{$id}'";
        $query = $conn->query($ins);
        $count = $query->rowCount();
        if ($count != 0) {
            foreach ($query as $row) {
                $cantstr = $row['cantidad'];
                $can = intval($cantstr);
                echo json_encode($can);
            }
        }
    }

?>