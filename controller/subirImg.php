<?php
    echo "<script>console.log('Entro');</script>";
    if(isset($_POST['file']))
    {
        echo "<script>console.log('Existe');</script>";
        $fileTmpPath = $_POST['img']['tmp_name'];
        $fileName = $_POST['img']['name'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        $allowedfileExtensions = array('png', 'jpg', 'jpeg');
        if(in_array($fileExtension, $allowedfileExtensions))
        {
            $uploadFileDir = '../imagenes/';
            $dest_path = $uploadFileDir . $fileName;

            if(move_uploaded_file($fileTmpPath, $dest_path))
            {
                echo "Imagne subida correctamente";
            }
            else
            {
                echo "Imagen no subida";
            }
        }
    }
    else
    {
        echo "<script>console.log('No se llama img o no existe');</script>";
    }
?>