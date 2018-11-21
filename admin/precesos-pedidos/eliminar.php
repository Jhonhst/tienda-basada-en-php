<?php

include('../procesos-admin/conexion.php');

//elimina los pedidos dependiendo
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $tabla =  $_POST['tabla'];
    $consulta = ("DELETE FROM $tabla WHERE id = $id ");
    $ejecuta = mysqli_query($con,$consulta);
    echo  'Se elimino exitosamente';

}