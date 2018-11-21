<?php
session_start();
include('../conexion/conexion.php');

//modifica la cantidad de articulos del carrito

if($_POST['id']){

    $nueva_cantidad = $_POST['cantidad'];
  
    foreach($_POST as $key => $value){
          $nuevo_producto[$key] = filter_var($value, FILTER_SANITIZE_STRING); //crear una nueva gama de productos
    }
    if(isset($_SESSION["producto"])){  
      if(isset($_SESSION["producto"][$nuevo_producto['id']])) //si ya existe este id dentro de la variable
      {
        //agrego la cantidad nueva
        $_SESSION["producto"][$nuevo_producto['id']]['cantidad'] = $nueva_cantidad;  
      }		
    }
}
