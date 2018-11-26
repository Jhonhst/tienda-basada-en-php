<?php 

include("../../conexion/conexion.php");

//modifica los datos del usuario
if(isset($_POST['nombre'])){
     $id = $_COOKIE['id'];
     $nombre = $_POST['nombre'];
     $cc = $_POST['cc'];
     $ciudad = $_POST['ciudad'];
     $email = $_POST['email'];
     $apellidos = $_POST['apellidos'];
     $direccion = $_POST['direccion'];
     $pais = $_POST['pais'];
     $telefono = $_POST['telefono'];

    
    $query = "UPDATE usuarios SET nombre ='$nombre',  apellidos ='$apellidos', cc =$cc, telefono =$telefono, email ='$email', pais ='$pais', ciudad ='$ciudad', direccion ='$direccion' WHERE id = $id";
    $result = mysqli_query($con, $query);
              
        if($query){
            echo "Se ha modificado correctamente";
        }
        else {
            echo "Ocurrió un error";
        }
}