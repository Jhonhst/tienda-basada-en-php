<?php

include('conexion.php');

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $consulta = ("DELETE FROM articulos WHERE id = $id ");
    $ejecuta = mysqli_query($con,$consulta);
    echo  '¡Se ha eliminado exitosamente!';

}