<?php

    if(isset($_FILES['img']))
    {
        $file = $_FILES['img'];
        $nombre = $file['name'];
        $fileTmpPath = $file['tmp_name'];
        $fileNameCmps = explode(".", $nombre);
        $fileExtension = strtolower(end($fileNameCmps));

        $allowedfileExtensions = array('png', 'jpg', 'jpeg');
        if(in_array($fileExtension, $allowedfileExtensions))
        {
            $uploadFileDir = '../imagenes/';
            $dest_path = $uploadFileDir . $nombre;

            if(move_uploaded_file($fileTmpPath, $dest_path))
            {
                echo "Imagen subida correctamente";
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