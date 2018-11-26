<?php

include('conexion.php');

if( $_FILES['file']['error'] == UPLOAD_ERR_OK ) 
{
    $file = $_FILES["file"];
    $nombre_img = $file["name"];
    $tipo = $file["type"];
    $ruta_provisional = $file["tmp_name"];
    $size = $file["size"];
    $dimensiones = getimagesize($ruta_provisional);
    $carpeta = "../../img/";

    //en caso de que el archivo no sea una imagen
    if ($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif')
    {
      echo "Error, el archivo no es una imagen"; 
    }
    else//si el archivo es una imagen as esto
    {
        $src = $carpeta.$nombre_img;
        move_uploaded_file($ruta_provisional, $src);
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $marca = $_POST['marca'];
        $categoria = $_POST['categoria'];
        $precio = $_POST['precio'];
        $cantidad = $_POST['cantidad'];
       
        $query = "UPDATE articulos SET nombre = '$nombre', descripcion = '$descripcion ', marca = '$marca', urlimg = '$nombre_img', precio = $precio, categoria = $categoria, deposito = $cantidad WHERE id = $id";
        $result = mysqli_query($con, $query);
                  
            if($query){
                echo "Se ha Modificado correctamente";
            }
            else {
                echo "Ocurrió un error";
            }
          
    }
}else if (isset($_POST['id'])){
 
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $marca = $_POST['marca'];
    $categoria = $_POST['categoria'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
   
    $query = "UPDATE articulos SET nombre = '$nombre', descripcion = '$descripcion ', marca = '$marca', precio = $precio, categoria = $categoria, deposito = $cantidad WHERE id = $id";
    $result = mysqli_query($con, $query);
              
        if($query){
            echo "Se ha Modificado correctamente";
        }
        else {
            echo "Ocurrió un error";
        }
}