<?php

include('conexion/conexion.php');

if($_POST){
    $usuario= $_POST['usuario'];
    $clave= $_POST['clave'];
    $sql_agregar="INSERT INTO usuarios (nombre,clave) VALUES ('$usuario' , '$clave') ";
    $filas_datos=mysqli_query($con,$sql_agregar);
   
    echo "registrado";

  //   $verificar_correo= ("SELECT * FROM usuarios WHERE usuario='$usuario'");
  //   $sentencia_verificar =$pdo->prepare($verificar_correo);
  //   $sentencia_verificar->execute(array());
  //   if($sentencia_verificar->fetchColumn()>0){
  //   echo  "<script>
  //   alert('El usuario ya esta registrado');
  //   window.history.go(-1);
  //   </script>";
  //   echo "usuario registrado";
  //   exit;
  //  }
     header('location:ingresar.php');
}
?>
<!-- registro de usuario -->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Registro de usuario</title>
     <!-- Bootstrap core CSS -->
     <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->
     <link rel="stylesheet" href="librerias/bootstrap/css/bootstrap.min.css">
  </head>

  <body class="text-center">
    <form action="" method="POST" class="form-signin" onsubmit="">
      <h1 class="h3 mb-3 font-weight-normal">Registro</h1>
      
      <label for="inputEmail" class="sr-only">Usuario</label>
      <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Nombre"  >
      
      
      <label for="inputPassword" class="sr-only">contaseña</label>
      <input type="text" name="clave" id="contrasenia" class="form-control" placeholder="Cotraseña" >
     
      
      <a href="index.php">Pagina Principal</a>

      <button class="btn btn-lg btn-primary btn-block" type="submit">Registrarse</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>

   
  </body>
</html>
