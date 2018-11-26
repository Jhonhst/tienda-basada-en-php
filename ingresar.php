<!-- ingresar usuario -->


<!doctype html>
<html lang="es-ES">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Ingresar usuario</title>
     <!-- Bootstrap core CSS -->
     <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->
     <link rel="stylesheet" href="librerias/bootstrap/css/bootstrap.min.css">
     <link rel="stylesheet" href="css/ingresar.css">
    <!-- Custom styles for this template -->
    
  </head>

  <body class="text-center">
    <form  id="form-ingresar" class="form-signin" >
      <h1 class="h3 mb-3 font-weight-normal">Ingresar</h1>

      <label for="inputEmail" class="sr-only">Usuario</label>
      <input type="text" name="usuario"  id="correo" class="form-control" placeholder="Usuario" >
      <label for="inputPassword" class="sr-only">Contraseña</label>
      <input type="password" name="clave"  id="contrasenia" class="form-control" placeholder="Contraseña" >
      <p>Usuario: usuario</p>
      <p>Usuario: 123456</p>

      <a href="index.php">Página Principal</a>
      <button class="btn btn-lg btn-primary btn-block" id="ingresar-sesion"> Ingresar</button>
      <!-- <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p> -->
      <!-- <input type="hidden" id="borrar-dos" value="renombrar"> -->
    </form>

    <script src="librerias/jquery/jquery-3.3.1.min.js"></script>
    <script src="js/inicio-sesion.js"></script>  
  </body>
</html>