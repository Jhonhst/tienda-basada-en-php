<!-- borrar cookies -->
<?php
session_start();
include('../conexion/conexion.php');

//borra lo cookie del usuario cuando este decide cerrar sesión.

if($_POST['borrar']){

    if(isset($_COOKIE['mail'])){

        setcookie("mail","",time()-1000,"/");
        setcookie("id","",time()-1000,"/");
    }
};

echo 'se borro la cookie' ;
?>