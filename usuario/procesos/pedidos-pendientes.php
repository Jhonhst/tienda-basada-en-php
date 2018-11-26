<?php

include("../../conexion/conexion.php");

//trae los datos del usuario
if(isset($_COOKIE['id'])){
    $id = $_COOKIE['id'];

    $consulta = "SELECT count(*) as total FROM pedidos WHERE idcliente = '$id'";
    $ejecutar = mysqli_query($con, $consulta);
    $dato =  mysqli_fetch_assoc($ejecutar);

    if($dato['total'] > 0){
      $consulta = "SELECT * FROM pedidos WHERE idcliente = '$id'";
      $ejecutar = mysqli_query($con, $consulta); 

      $json = array();
      while($dato = mysqli_fetch_array($ejecutar)) {
        $json[] = array(
          'nombre' => $dato['nombre'],
          'pais' => $dato['pais'],
          'ciudad' => $dato['ciudad'],
          'direccion' => $dato['direccion'],
          'total' => $dato['total'],
        );
      }
    }else{
      $json[] = array(
        'nombre' => 0,
      );
    }


    $jsonstring = json_encode($json);
    echo $jsonstring;
}