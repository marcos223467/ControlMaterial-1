<?php
    require '../database.php';
    session_start();

    if(isset($_POST['id']))
    {
        $select = "SELECT descripcion FROM material WHERE id = ".$_POST['id'];
        $query = $conn->query($select);
        $count = $query->rowCount();
        if ($count != 0) {
            foreach ($query as $row) {
                $data = array('descripcion' => $row['descripcion'], 'cantidad' => $_POST['cantidad']);
                echo json_encode($data);
            }
        }
    }
    
?>