<?php

    require '../database.php';
    session_start();

    if ($_POST['fecha'] != "" && $_POST['horaInicio'] != "" && $_POST['horaFin'] != "") {
        $fecha = $_POST['fecha'];
        $horaInicio = $_POST['horaInicio'];
        $horaFin = $_POST['horaFin'];
    }
    $select = "SELECT id, descripcion FROM material ORDER BY categoria";
    $query = $conn->query($select);
    $count = $query->rowCount();
    if ($count != 0) {
        foreach ($query as $row) {
            $id = intval($row['id']);
            $descripcion = $row['descripcion'];
            $envio = array($id, $descripcion);
            echo json_encode($envio);
        }
    }

?>