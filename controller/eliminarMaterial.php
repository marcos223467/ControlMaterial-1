<?php
    require '../database.php';
    
    if(isset($_POST['id']))
    {
        $id = $_POST['id'];

        $delete = "DELETE FROM material WHERE id = '$id'";
        $stmt = $conn->prepare($delete);

        if($stmt->execute()){
           $data = "Se elimino con exito";
           echo $data; 
        }
    }
?>