<?php

include('conexion/conexion.php');

if($_POST){
    $usuario= $_POST['usuario'];
    $clave= $_POST['clave'];
    $nombre= $_POST['nombre'];
    $email= $_POST['email'];

  $verificar_correo= ("SELECT count(*) as total FROM usuarios WHERE usuario='$usuario'");
    $ejecuta = mysqli_query($con, $verificar_correo);
    $total = mysqli_fetch_assoc($ejecuta);

    if($total['total'] > 0){
    echo  "<script>
    alert('El usuario ya esta registrado');
    window.history.go(-1);
    </script>";
    exit;
   }else{
    $sql_agregar="INSERT INTO usuarios (usuario,nombre,email,clave) VALUES ('$usuario' ,'$nombre','$email', '$clave') ";
    $ejecutar=mysqli_query($con,$sql_agregar);
   
    echo  "<script>
    alert('Se ha registrado de manera exitosa');
    window.location='index.php';
    </script>";
   }
     
}
// ?>
<!-- registro de usuario -->
<!doctype html>
<html lang="es-ES">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Registro de usuario</title>
     <!-- Bootstrap core CSS -->
     <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->
     <link rel="stylesheet" href="librerias/bootstrap/css/bootstrap.min.css">
     <link rel="stylesheet" href="css/ingresar.css">
  </head>

  <body class="text-center">
    <form action="" method="POST" class="form-signin" onsubmit="return validar()">
      <h1 class="h3 mb-3 font-weight-normal">Registro</h1>
      
      <label for="inputEmail" class="sr-only">Usuario</label>
      <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Usuario" >

      <label for="inputEmail" class="sr-only">Nombre</label>
      <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre"  >

      <label for="inputEmail" class="sr-only">Email</label>
      <input type="text" id="email" name="email" class="form-control" placeholder="Email"  >
      
      
      <label for="inputPassword" class="sr-only">contraseña</label>
      <input type="password" name="clave" id="clave" class="form-control" placeholder="Cotraseña" >
     
      
      <a href="index.php">Página Principal</a>

      <button class="btn btn-lg btn-primary btn-block" type="submit">Registrarse</button>

    </form>

  </body>
  <script src="librerias/jquery/jquery-3.3.1.min.js"></script>
  <script>
    function validar(e){
      // e.preventDefault();
      var usuario = $('#usuario').val();
      var nombre = $('#nombre').val();
      var email = $('#email').val();
      var clave = $('#clave').val();

      if(usuario == '' || nombre == '' || email == '' || clave == ''){
        alert('Todos los campos deben estar completos')
        return false;
        e.preventDefault();
      }
      
    }   
   </script>

</html>
