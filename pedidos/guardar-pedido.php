<?php
session_start();
include('../conexion/conexion.php');

//guarda los datos del usuario para la compra, direcciones, contactos formas de pago

//debo acomodar para que los datos los como el total sub-total y eso lo haga aqui y no desde la interfas donde pueden ser modicados.

  if(isset($_POST['nombre'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $cc = $_POST['cc'];
    $direccion = $_POST['direccion'];
    $ciudad = $_POST['ciudad'];
    $pais = $_POST['pais'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $envio = $_POST['envio'];
    $pago = $_POST['pago'];
    $subtotal = $_POST['subtotal'];
    $precioenvio = $_POST['precioenvio'];
    $total = $_POST['total'];
    $idcliente = $_POST['idcliente'];
   
    date_default_timezone_set('America/Lima');//para que la fecha salga con mi zona-horaria
    $fecha = date("Y-m-d");

      $query = "INSERT INTO pedidos (fecha, nombre, apellido, cc, direccion, ciudad, pais, email, telefono, envio, pago, subtotal, precioenvio, total, idcliente) VALUES ('$fecha','$nombre','$apellido', '$cc', '$direccion', '$ciudad', '$pais', '$email', '$telefono', '$envio', '$pago', '$subtotal', '$precioenvio', '$total', '$idcliente')";
      $result = mysqli_query($con, $query);

      echo $pago;
      	
	    // $respuesta = new stdClass();
	
	    // if($con->query($query)){
      //   $respuesta->mensaje = "Se guardo correctamente";
      //   $respuesta->pago = $pago;
	    // }
	    // else {
		  //   $respuesta->mensaje = "Ocurrio un error";
	    // }
      // echo json_encode($respuesta);  


      
	    
	
	    // if($con->query($query)){
      //   $json[] = array(
      //     'id' => $row['ai'],
      //     'cantidad' => $cantidad,
      //     'nombre' => $row['an'],
      //     'urlimg' => $row['urlimg'],
      //     'precio' => $row['precio'],
      //     'deposito' => $row['deposito']
      //   );
	    // }
	    // else {
      //   $json[] = array(
      //     'id' => $row['ai'],
      //     'cantidad' => $cantidad,
      //     'nombre' => $row['an'],
      //     'urlimg' => $row['urlimg'],
      //     'precio' => $row['precio'],
      //     'deposito' => $row['deposito']
      //   );
	    // }
      // $jsonstring = json_encode($json);
      // echo $jsonstring; 
      
      
     
  }  
