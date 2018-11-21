<?php

//se encargar de traer los darticus con su respectivo paginador con el limit el offeset
include('../procesos-admin/conexion.php');


    $limit = isset($_POST["limit"]) && intval($_POST["limit"]) > 0 ? intval($_POST["limit"])	: 10;
    $offset = isset($_POST["offset"]) && intval($_POST["offset"])>=0	? intval($_POST["offset"])	: 0;

    // array para devolver la informacion
    $json = array();
    $data = array();
    //consulta que deseamos realizar a la db	
    $query = $con->prepare("SELECT id, nombre, apellidos, cc, telefono, email, pais, ciudad, direccion, pedidos from usuarios  ORDER BY id DESC limit ? offset ?");
    $query->bind_param("ii",$limit,$offset);
    $query->execute();

    
    // // vincular variables a la sentencia preparada 
    $query->bind_result($id, $nombre, $apellidos, $cc, $telefono, $email, $pais, $ciudad, $direccion, $pedidos );

    // obtener valores 
    while ($query->fetch()) {
	    $data_json = array();
        $data_json["id"] = $id;
        $data_json["nombre"] = $nombre;
        $data_json["apellidos"] = $apellidos;
        $data_json["cc"] = $cc;
        $data_json["telefono"] = $telefono;
        $data_json["email"] = $email;
        $data_json["pais"] = $pais;
        $data_json["ciudad"] = $ciudad;
        $data_json["direccion"] = $direccion;
        $data_json["pedidos"] = $pedidos;
	    $data[]=$data_json;	
    }

    // obtiene la cantidad de registros
    $cantidad_consulta = $con->query("SELECT count(*) as total FROM usuarios");
    $row = $cantidad_consulta->fetch_assoc();
    $cantidad['cantidad']=$row['total'];

    $json["lista"] = array_values($data);
    $json["cantidad"] = array_values($cantidad);

    // envia la respuesta en formato json		
    header("Content-type:application/json; charset = utf-8");
    echo json_encode($json);

?>