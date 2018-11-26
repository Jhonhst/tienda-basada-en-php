<?php 
session_start();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mi tienda.com</title>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->
    <link href="https://fonts.googleapis.com/css?family=Oleo+Script" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">  
    <link rel="stylesheet" href="librerias/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="librerias/font-awesome/all.css"> -->
</head>
<body >
    <!--inicio del navbar para el login -->
    <nav class="navbar navbar-expand navbar-dark bg-navbar bordee">
        <a class="navbar-brand letra" href="index.php">Mi tienda.com</a>
        
        <div class="collapse navbar-collapse" id="">
          <ul class="navbar-nav ml-auto my-lg-0">
          <li class="nav-item d-none d-md-block">
            <a class="nav-link" href="admin/">Administrador</a>
          </li>
          <?php if(!isset($_COOKIE['mail'])): ?>
          <li class="nav-item">
            <a class="nav-link" href="ingresar.php">Ingresar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="registro.php">Registrarse</a>
          </li>
          <?php endif ?>
         
          <!-- fin de no registrado -->
          <!-- inicio de registrado -->
          <?php if(isset($_COOKIE['mail'])): ?>
          <li class="nav-item">
            <a class="nav-link" href="usuario">Hola <?php echo $_COOKIE['mail'];?></a>
          </li>
          <li class="nav-item">
            <form >
            <input type="hidden" id="borrar" value="borrar">
            <buttom type="buttom" id="cerrar-sesion"  class="btn btn-primary mr-2" > Cerrar Sesión</buttom>
            </form>
          </li>
          <?php endif ?>
          <!-- fin del registrado -->
          </ul>
        </div>
    </nav>
    <!--fin del navbar para el login -->
    <!-- inicio de la imagen central -->
    <div>
        <img src="img/fondo-tienda.png" class="imagen-central img-fluid"  alt="">
    </div>
    <!-- fin de la imagen central -->

    <!--inicio del navbar para el menu -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-navbar-uno">
        <a class="navbar-brand letra" href="#">Categorías</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
              <a class="nav-link" href="index.php">General<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="categoria.php?categoria=relojes">Relojes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="categoria.php?categoria=lentes">Lentes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="categoria.php?categoria=billeteras">Billeteras</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="categoria.php?categoria=zapatos">Zapatos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="categoria.php?categoria=gorras">Gorras</a>
            </li>
          </ul>
        </div>

        <div class=" my-2 my-lg-0">
            <p class="numero-carrito" id="boton-carrito">
              <i class="fas fa-cart-arrow-down carrito"></i>
              <span class="numero-del-carrito"></span> 
            </p>       
        </div>
    </nav>
    <!--fin del navbar para el menu -->

    <!-- inicio de la tabla del pedido -->
    <div class="container mb-5 tablilla" id="tabla" >
        <table class="table table-sm mb-5 table-bordered bordee">
          <thead>
            <tr>
              <th scope="col" class="text-center d-none d-md-block">Cantidad</th>
              <th scope="col">Producto</th>
              <th scope="col">Precio Unitario</th>
              <th scope="col">Total</th>
            </tr>
          </thead>
          <tbody id="datos-carrito">
          
          </tbody>
          <tbody>
            <tr>
              <td scope="row" class="text-right d-none d-md-block" colspan="3">Total a cancelar</td> 
              <td><strong>$ </strong><strong class="total-cancelar">  </strong></td>
              <td id="boton-finalizar-compra"> </td>
            </tr>
          </tbody>
        </table>
    </div>
  




