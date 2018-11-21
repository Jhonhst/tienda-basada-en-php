<?php

include('../procesos-admin/conexion.php');

//trae los datos para que se vean de manera individual dependiendo la tabla 
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $tabla =  $_POST['tabla'];
    $consulta = "SELECT 
    $tabla.id as idpe, 
    $tabla.fecha as fechape, 
    $tabla.nombre as nombrepe, 
    $tabla.apellido as apellidope, 
    $tabla.cc as ccpe, 
    $tabla.direccion as direccionpe, 
    $tabla.ciudad as ciudadpe, 
    $tabla.pais as paispe, 
    $tabla.email as emailpe, 
    $tabla.telefono as telefonope, 
    $tabla.envio as enviope, 
    $tabla.pago as pagope, 
    $tabla.subtotal as subtotalpe, 
    $tabla.precioenvio as precioenviope, 
    $tabla.total as totalpe, 
    $tabla.idcliente as idclientepe,
    usuarios.id as idus,
    usuarios.nombre as nombreus
    FROM $tabla  JOIN usuarios  ON $tabla.idcliente=usuarios.id WHERE $tabla.id = $id";

    $ejecutar=mysqli_query($con,$consulta);
     

        while($row = mysqli_fetch_array($ejecutar)) {
            $json[] = array(
            'idpe' => $row['idpe'],
            'fechape' => $row['fechape'],
            'nombrepe' => $row['nombrepe'],
            'apellidope' => $row['apellidope'],
            'ccpe' => $row['ccpe'],
            'direccionpe' => $row['direccionpe'],
            'ciudadpe' => $row['ciudadpe'],
            'paispe' => $row['paispe'],
            'emailpe' => $row['emailpe'],
            'telefonope' => $row['telefonope'],
            'enviope' => $row['enviope'],
            'pagope' => $row['pagope'],
            'subtotalpe' => $row['subtotalpe'],
            'precioenviope' => $row['precioenviope'],
            'totalpe' => $row['totalpe'],
            'idclientepe' => $row['idclientepe'],
            'idus' => $row['idus'],
            'nombreus' => $row['nombreus'],
            );
        }
    
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
