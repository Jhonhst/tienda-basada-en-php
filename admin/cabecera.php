<?php 
session_start();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administrador</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/admin.css">
  
    <link href="https://fonts.googleapis.com/css?family=Oleo+Script" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Antic+Slab|Hind+Vadodara|Rajdhani" rel="stylesheet">   
    <link rel="stylesheet" href="../librerias/bootstrap/css/bootstrap.min.css">

    <!-- <link rel="stylesheet" href="librerias/font-awesome/all.css"> -->
</head>
<body >

    <!--inicio del navbar para el menu -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Administración</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
              <a class="nav-link" href="index1.php">Articulos<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="usuarios.php">Usuarios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pedidos-pendientes.php">Pedidos Pendientes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pedidos-realizados.php">Pedidos realizados</a>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto my-lg-0">
         
         <!-- fin de no registrado -->
         <!-- inicio de registrado -->
         <?php if(isset($_COOKIE['mail'])): ?>
         <li class="nav-item">
           <a class="nav-link" href="#">hola <?php echo $_COOKIE['mail'];?></a>
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
    <!--fin del navbar para el menu -->
