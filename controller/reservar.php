<?php

    require '../database.php';
    session_start();

    if ($_POST['reserva'] != "" && $_POST['hreserva'] != "" && $_POST['hdevolucion'] != "" && $_POST['matycant'] != "") {
        $reserva = $_POST['reserva'];
        $hreserva = $_POST['hreserva'];
        $hdevolucion = $_POST['hdevolucion'];
        $matycant = $_POST['matycant'];
        echo "<script>console.log($matycant[0])</script>";
        $id = null;
        $userid = $_SESSION['user_id'];

        $ins = "INSERT INTO reservas (id, fecha_inicio, hora_inicio, hora_fin, cantidad_y_material, id_user) VALUES (:id, :reserva, :hreserva, :hdevolucion, :matycant, :iduser)";
        $stmt = $conn->prepare($ins);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':reserva', $reserva);
        $stmt->bindParam(':hreserva', $hreserva);
        $stmt->bindParam(':hdevolucion', $hdevolucion);
        $stmt->bindParam(':matycant', $matycant);
        $stmt->bindParam(':iduser', $userid);

        if($stmt->execute()){
            $data = array('id' => $id, 'reserva' => $reserva, 'hreserva' => $hreserva, 'hdevolucion' => $hdevolucion, 'matycant' => $matycant);
            echo json_encode($data);
        }
    }

?>