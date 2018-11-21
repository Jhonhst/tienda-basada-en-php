<?php

include('conexion.php');

if (isset($_FILES["file"]))
{
   
    $file = $_FILES["file"];
    $nombre_img = $file["name"];
    $tipo = $file["type"];
    $ruta_provisional = $file["tmp_name"];
    $size = $file["size"];
    $dimensiones = getimagesize($ruta_provisional);
    $carpeta = "../../img/";

    if ($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif')
    {
      echo "Error, el archivo no es una imagen"; 
    }
    else
    {
        $src = $carpeta.$nombre_img;
        move_uploaded_file($ruta_provisional, $src);

        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $marca = $_POST['marca'];
        $categoria = $_POST['categoria'];
        $precio = $_POST['precio'];
        $cantidad = $_POST['cantidad'];
       
        $query = "INSERT INTO articulos (nombre, descripcion, marca, urlimg, precio, 	categoria, deposito) VALUES ('$nombre','$descripcion ', '$marca','$nombre_img',$precio, $categoria,  $cantidad)";
        $result = mysqli_query($con, $query);
                  
            if($query){
                $json = "Se guardo correctamente";
            }
            else {
                $json = "Ocurrio un error";
            }
            echo json_encode($json); 
    }
}
   