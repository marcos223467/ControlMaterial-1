<?php

    require '../database.php';
    session_start();

    if ($_POST['fecha'] != "" && $_POST['horaInicio'] != "" && $_POST['horaFin'] != "") {
        $fecha = $_POST['fecha'];
        $horaInicio = $_POST['horaInicio'];
        $horaFin = $_POST['horaFin'];
    }

    $select = "SELECT cantidad_y_material FROM reservas WHERE fecha_inicio = '$fecha'";
    $query = $conn->query($select);
    $count = $query->rowCount();

    if ($count == 0) {
        $select1 = "SELECT id, descripcion FROM material ORDER BY categoria";
        $query1 = $conn->query($select1);
        $count1 = $query1->rowCount();
        if ($count1 != 0) {
            foreach ($query1 as $row1) {
                $id = intval($row1['id']);
                $descripcion = $row1['descripcion'];
                $envio = array($id, $descripcion);
                echo json_encode($envio);
            }
        }
    } else {

    }

?>