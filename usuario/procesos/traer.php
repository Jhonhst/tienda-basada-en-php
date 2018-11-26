<?php

include("../../conexion/conexion.php");

//trae los datos del usuario
if(isset($_COOKIE['mail'])){
    $usuario = $_COOKIE['mail'];

    $consulta = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
    $ejecutar = mysqli_query($con, $consulta); 

    $json = array();
    while($dato = mysqli_fetch_array($ejecutar)) {
      $json[] = array(
        'id' => $dato['id'],
        'usuario' => $dato['usuario'],
        'nombre' => $dato['nombre'],
        'apellidos' => $dato['apellidos'],
        'cc' => $dato['cc'],
        'telefono' => $dato['telefono'],
        'email' => $dato['email'],
        'pais' => $dato['pais'],
        'ciudad' => $dato['ciudad'],
        'direccion' => $dato['direccion'],
        'pedidos' => $dato['pedidos'],
      );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}else{
  $json[] = array(//le coloco esta para que mande algo y no me retorne error por ajax, con esto no se hace nada.
    'id' => 0,
  );
  $jsonstring = json_encode($json);
  echo $jsonstring;
}


