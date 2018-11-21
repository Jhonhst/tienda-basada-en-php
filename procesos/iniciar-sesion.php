<?php
include('../conexion/conexion.php');

if($_POST){
    $correo = $_POST['usuario'];
    $clave = $_POST['clave'];

    $sql_leer= 'SELECT * FROM  usuarios';
    $ejecutar=mysqli_query($con,$sql_leer);
    $resultado=mysqli_fetch_assoc($ejecutar);
    foreach($ejecutar as $dato){
      if($dato['nombre'] == $correo && $dato['clave'] == $clave){

        setcookie("mail",$dato['nombre'],time()+(60*60*24*365),"/");
        setcookie("id",$dato['id'],time()+(60*60*24*365),"/");
     
        echo 'bien se inicio este veta';
        break;
      }else{
        echo 'no se inicio esta vaina';
        break;
      }
    }


}

?>