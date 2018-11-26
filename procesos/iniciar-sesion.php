<?php
include('../conexion/conexion.php');

if($_POST){
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    $sql_leer= 'SELECT * FROM  usuarios';
    $ejecutar=mysqli_query($con,$sql_leer);

    while($dato =  mysqli_fetch_assoc($ejecutar)){
      if($dato['usuario'] == $usuario && $dato['clave'] == $clave){

        setcookie("mail",$dato['usuario'],time()+(60*60*24*365),"/");
        setcookie("id",$dato['id'],time()+(60*60*24*365),"/");
     
        echo $error = 1;
       break;//se detendra cuando encuentre una coincidencia
      }else{
        $error = 0;
      }
    }
    
    if(empty($error)){
      echo substr($error, -1, 1); //si no encuetra nada entonces que mande un 0 para que ajax retorne un alert negativo
    }



}



?>