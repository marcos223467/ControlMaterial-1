<?php
    require '../database.php';
    session_start();

    if(isset($_POST['fecha_ini']))
    {
        $select = "SELECT * FROM reservas WHERE fecha_inicio = '".$_POST['fecha_ini']."'";
        $query = $conn->query($select);
        $count = $query->rowCount();
        $data = array();
        if ($count != 0) {
            foreach ($query as $row) {
                $datos = array('fecha_inicio' => $row['fecha_inicio'], 'hora_inicio' => $row['hora_inicio'], 'hora_fin' => $row['hora_fin'], 'cant_mat' => $row['cantidad_y_material']);
                array_push($data, $datos);
            }
            echo json_encode($data);
        }
    }
    else
    {
        echo "<script> console.log('no hay fecha_ini');</script>";
    }

?>