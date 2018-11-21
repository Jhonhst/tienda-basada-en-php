<?php

//trae los datos para que se vean el formulario antes de de ser modificados
include('conexion.php');

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $consulta = ("SELECT * FROM articulos WHERE id = $id ");
    $ejecutar = mysqli_query($con,$consulta);
    while($row = mysqli_fetch_array($ejecutar)) {
        $json[] = array(
            'id' => $row['id'],
            'nombre' => $row['nombre'],
            'descripcion' =>$row['descripcion'],
            'marca'=> $row['marca'],
            'categoria' => $row['categoria'],
            'precio' => $row['precio'],
            'deposito' => $row['deposito'],
            'urlimg' => $row['urlimg'],
        );
      }
      $jsonstring = json_encode($json);
      echo $jsonstring;

}