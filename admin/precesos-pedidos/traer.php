<?php

//se encargar de traer los darticus con su respectivo paginador con el limit el offeset
include('../procesos-admin/conexion.php');

    //trae los datos que se veran en la lista dependiendo la tabla
    $tabla = $_POST['tabla'];
    $limit = isset($_POST["limit"]) && intval($_POST["limit"]) > 0 ? intval($_POST["limit"])	: 10;
    $offset = isset($_POST["offset"]) && intval($_POST["offset"])>=0	? intval($_POST["offset"])	: 0;

    // array para devolver la informacion
    $json = array();
    $data = array();
    //consulta que deseamos realizar a la db
    if( $tabla == 'pedidos'){
        $query = $con->prepare("SELECT pedidos.id as idpe, fecha, usuarios.nombre as nombreus
        FROM $tabla  JOIN usuarios  ON pedidos.idcliente=usuarios.id  ORDER BY pedidos.id DESC limit ? offset ?");

    }
    else if($tabla == 'pedidosrealizados'){
        $query = $con->prepare("SELECT pedidosrealizados.id as idpe, fecha, usuarios.nombre as nombreus
        FROM $tabla  JOIN usuarios  ON pedidosrealizados.idcliente=usuarios.id  ORDER BY pedidosrealizados.id DESC limit ? offset ?");
    }
 
    $query->bind_param("ii",$limit,$offset);
    $query->execute();

    // // vincular variables a la sentencia preparada 
    $query->bind_result($idpe, $fecha, $nombreus);

    // obtener valores 
    while ($query->fetch()) {
	    $data_json = array();
        $data_json["id"] = $idpe;
        $data_json["fecha"] = $fecha;
	    $data_json["nombre"] = $nombreus;	
	    $data[]=$data_json;	
    }

    // obtiene la cantidad de registros
    $cantidad_consulta = $con->query("SELECT count(*) as total FROM $tabla");
    $row = $cantidad_consulta->fetch_assoc();
    $cantidad['cantidad']=$row['total'];

    $json["lista"] = array_values($data);
    $json["cantidad"] = array_values($cantidad);

    // envia la respuesta en formato json		
    header("Content-type:application/json; charset = utf-8");
    echo json_encode($json);


?>