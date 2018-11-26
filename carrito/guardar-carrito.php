<?php
session_start();
include('../conexion/conexion.php');

//guarda dentro de una variable de sesión los articulos para el carrito.

//de todo lo que esta aqui solo envie con $_SESSION["products"] a el archivo mostra-carrito.php el id y la cantidad pero deje el resto por ciacaso lo necesite despues

if(isset($_POST['id'])){

  //con este ciclo se van a crear dos variables, debido a que les estoy diciendo que todo lo que llegue por el metodo post lo guarde dentro de la variable $nuevo_producto[$key] la cual en donde dice [$key] va ir los datos que estan llegando, es decir, esta varible es de tipo array, en la cual [$key] es la clave y $value es el valor el cual le estoy pidiendo que me lo filtre para que sea de tipo string
  foreach($_POST as $key => $value){
		$nuevo_producto[$key] = filter_var($value, FILTER_SANITIZE_STRING); //crear una nueva gama de productos
  }
  $consulta = $con->prepare("SELECT id, nombre, urlimg, precio, deposito FROM articulos WHERE id=? LIMIT 1");
	$consulta->bind_param('s', $nuevo_producto['id']);//la 's' es el tipo de parametro en este caso es string el segundo es el dato.
	$consulta->execute();
	$consulta->bind_result($id, $nombre, $urlimg, $precio, $deposito);
	

	while($consulta->fetch()){ 
    //de momento solo necesito el id y la cantidad los cuales ya se guardan en $nuevo_producto, no supe como lo cual debo investigar!
    // $nuevo_producto["nombre"] = $nombre; //buscar el campo del producto de la base de datos
    // $nuevo_producto["urlimg"] = $urlimg; //buscar el campo del producto de la base de datos
    // $nuevo_productot["precio"] = $precio; //buscar el campo del producto de la base de datos
		// $nuevo_producto["deposito"] = $deposito; //buscar el campo del producto de la base de datos
		
		if(isset($_SESSION["producto"])){  
			if(isset($_SESSION["producto"][$nuevo_producto['id']])) //si ya existe este id dentro de la variable
			{
        unset($_SESSION["producto"][$nuevo_producto['id']]);  //si ya existe este id dentro de la variable destruyelo(borrar), esto es para que no se repita.
        echo 'Este artículo ya se ha Guardado anteriormente';  
			}else{
        echo 'Se añadió de manera exitosa';
      }		
		}
    //$_SESSION["producto"] va a tener un array como primer parametro es el id y de hece id se va a craer como otro array en el cual se a agregar todo lo que venga por $nuevo_producto en este caso y si por ejemplo coloco $nuevo_producto["deposito"] = $deposito tambie se va aguadar despues del id 
    $_SESSION["producto"][$nuevo_producto['id']] = $nuevo_producto;	//actualizar productos con nueva matriz de elementos
    echo ' En el carrito';
	}
}

