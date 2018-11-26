<?php
include('procesos-admin/conexion.php');

if($_POST){
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    $sql_leer= 'SELECT * FROM  admin';
    $ejecutar=mysqli_query($con,$sql_leer);

    while($dato =  mysqli_fetch_assoc($ejecutar)){
      if($dato['administrador'] == $usuario && $dato['clave'] == $clave){

        setcookie("admin",$dato['administrador'],time()+(60*60*24*365),"/"); 
        header("Location:articulos.php");    
       break;//se detendra cuando encuentre una coincidencia
      }else{
        echo  "<script>
        alert('Usuario o contraseña incorrectos');
        window.history.go(-1);
        </script>";
        exit;
      }
    }
    
    


}



?>