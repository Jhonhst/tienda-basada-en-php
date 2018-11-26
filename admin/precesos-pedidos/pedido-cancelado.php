<?php

include('../procesos-admin/conexion.php');
//envia los datos a la tabla de pedidos realizados y la elimina de la tabla pedidos (pendientes)
if(isset($_POST['id'])){//primero se selccionan los datos a enviar, aqui hay dos tablas convinadas pero solo se usa los datos de "pedidos".
    $id = $_POST['id'];
    $consulta = "SELECT 
    pedidos.id as idpe, 
    pedidos.fecha as fechape, 
    pedidos.nombre as nombrepe, 
    pedidos.apellido as apellidope, 
    pedidos.cc as ccpe, 
    pedidos.direccion as direccionpe, 
    pedidos.ciudad as ciudadpe, 
    pedidos.pais as paispe, 
    pedidos.email as emailpe, 
    pedidos.telefono as telefonope, 
    pedidos.envio as enviope, 
    pedidos.pago as pagope, 
    pedidos.subtotal as subtotalpe, 
    pedidos.precioenvio as precioenviope, 
    pedidos.total as totalpe, 
    pedidos.idcliente as idclientepe,
    usuarios.id as idus,
    usuarios.nombre as nombreus
    FROM pedidos  JOIN usuarios  ON pedidos.idcliente=usuarios.id WHERE pedidos.id = $id";

    $ejecutar=mysqli_query($con,$consulta);
   
        while($row = mysqli_fetch_array($ejecutar)) {//se guardan los datos
           
            $idpe = $row['idpe'];
            $fecha = $row['fechape'];
            $nombrepe = $row['nombrepe'];
            $apellidope = $row['apellidope'];
            $ccpe = $row['ccpe'];
            $direccionpe = $row['direccionpe'];
            $ciudadpe = $row['ciudadpe'];
            $paispe = $row['paispe'];
            $emailpe = $row['emailpe'];
            $telefonope = $row['telefonope'];
            $enviope = $row['enviope'];
            $pagope = $row['pagope'];
            $subtotalpe = $row['subtotalpe'];
            $precioenviope = $row['precioenviope'];
            $totalpe = $row['totalpe'];
            $idclientepe = $row['idclientepe'];
         
        }

        $query = "INSERT INTO pedidosrealizados (id,fecha, nombre, apellido, cc, direccion, ciudad, pais, email, telefono, envio, pago, subtotal, precioenvio, total, idcliente) VALUES ('$idpe','$fecha', '$nombrepe', '$apellidope', $ccpe, '$direccionpe', '$ciudadpe', '$paispe', '$emailpe', $telefonope, '$enviope', '$pagope', $subtotalpe, $precioenviope, $totalpe, $idclientepe)";

        $ejecutar_envio=mysqli_query($con,$query);

        $consulta_id = ("DELETE FROM pedidos WHERE id = $id ");
        $elimina = mysqli_query($con,$consulta_id);
        echo  'EL pedido se ha enviado a pedidos realizados';


}
