<?php
//eliminar usuario
include('../procesos-admin/conexion.php');

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $consulta = ("DELETE FROM usuarios WHERE id = $id ");
    $ejecuta = mysqli_query($con,$consulta);
    echo  'Se elimino exitosamente';

}