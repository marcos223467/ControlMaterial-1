<?php

    require '../database.php';
    session_start();

    if ($_POST['reserva'] != "" && $_POST['hreserva'] != "" && $_POST['hdevolucion'] != "" && $_POST['mat'] != "" && $_POST['cant'] != "") {
        $reserva = $_POST['reserva'];
        $hreserva = $_POST['hreserva'];
        $hdevolucion = $_POST['hdevolucion'];
        $mat = $_POST['mat'];
        $cant = $_POST['cant'];
        $id = null;
        $userid = $_SESSION['user_id'];
        $cantmat = $mat .",". $cant;

        $ins = "INSERT INTO reservas (id, fecha_inicio, hora_inicio, hora_fin, cantidad_y_material, id_user) VALUES (:id, :reserva, :hreserva, :hdevolucion, :cantmat, :iduser)";
        $stmt = $conn->prepare($ins);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':reserva', $reserva);
        $stmt->bindParam(':hreserva', $hreserva);
        $stmt->bindParam(':hdevolucion', $hdevolucion);
        $stmt->bindParam(':cantmat', $cantmat);
        $stmt->bindParam(':iduser', $userid);

        if($stmt->execute()){
            $data = array('id' => $id, 'reserva' => $reserva, 'hreserva' => $hreserva, 'hdevolucion' => $hdevolucion, 'cant' => $cant, 'mat' => $mat);
            echo json_encode($data);
        }
    }

?>