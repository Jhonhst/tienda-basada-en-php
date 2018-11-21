<?php
session_start();
include('../conexion/conexion.php');

//retorna los articulos que se mostraran

if(isset($_SESSION["producto"])){

  if(count($_SESSION["producto"])<=0){//si no hay articulos me mande este array que en ajax le tengo encargado un trabajo.
    $json[] = array(
      'id' => 0
    );
    $jsonstring = json_encode($json);
    echo $jsonstring;
  }else{

    $json = array();//guarda el array
    foreach($_SESSION["producto"] as $producto){ //extraifo los datos que estan en la variable de sesión uso foreach para tomar los datos ya que vienen tipo array.
	
      //los datos que necesito de la variable de sesión el id para hacer la busqueda en la base de datos y la cantidad es mandada por el usuario.
      $id= $producto["id"]; 
      $cantidad= $producto["cantidad"];

      $consulta="SELECT articulos.id AS ai, articulos.nombre AS an, urlimg, precio,     categoria, deposito, categorias.id AS ci, categorias.nombre AS cn  FROM articulos    JOIN categorias ON categoria=categorias.id  where  articulos.id='$id'";
      $ejecutar=mysqli_query($con,$consulta);
     
      if (!$ejecutar) {      
        $json[] = array(
          'id' => 0
        );
      }else if ($ejecutar){
        while($row = mysqli_fetch_array($ejecutar)) {
          $json[] = array(
             'id' => $row['ai'],
            'cantidad' => $cantidad,
            'nombre' => $row['an'],
            'urlimg' => $row['urlimg'],
            'precio' => $row['precio'],
            'deposito' => $row['deposito']
          );
        }
      }
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
  }
}else{
    $json[] = array(
      'id' => 0
    );
    $jsonstring = json_encode($json);
    echo $jsonstring;
}

