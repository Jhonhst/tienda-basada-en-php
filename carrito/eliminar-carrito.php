<?php
session_start();
include('../conexion/conexion.php');

//elimina articulos del carrito
if($_POST['id']){
  
  foreach($_POST as $key => $value){
		$nuevo_producto[$key] = filter_var($value, FILTER_SANITIZE_STRING); //crear una nueva gama de productos
  }
  if(isset($_SESSION["producto"])){  
    if(isset($_SESSION["producto"][$nuevo_producto['id']])) //si ya existe este id dentro de la variable
    {
      unset($_SESSION["producto"][$nuevo_producto['id']]);  //si ya existe este id dentro de la variable destruyelo(borrar), esto es para que no se repita.
      echo 'Se ha eliminado el articulo';  
    }		
  }
}
