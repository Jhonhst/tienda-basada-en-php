<?php

//se encargar de traer los darticus con su respectivo paginador con el limit el offeset
include('conexion.php');

if(isset($_POST["categoria"])){

    $nombrecategoria = $_POST['categoria'];
    $limit = isset($_POST["limit"]) && intval($_POST["limit"]) > 0 ? intval($_POST["limit"])	: 10;
    $offset = isset($_POST["offset"]) && intval($_POST["offset"])>=0	? intval($_POST["offset"])	: 0;

    // array para devolver la informacion
    $json = array();
    $data = array();
    //consulta que deseamos realizar a la db	
    $query = $con->prepare("SELECT articulos.id AS ai, articulos.nombre AS an, urlimg, precio, deposito, categoria, categorias.id AS ci, categorias.nombre AS cn  FROM articulos  JOIN categorias ON categoria=categorias.id where  categorias.nombre='$nombrecategoria'  ORDER BY articulos.id DESC limit ? offset ?");
    $query->bind_param("ii",$limit,$offset);
    $query->execute();

    // // vincular variables a la sentencia preparada 
    $query->bind_result($ai, $an, $urlimg, $precio, $deposito, $categoria, $ci,$cn);

    // obtener valores 
    while ($query->fetch()) {
	    $data_json = array();
	    $data_json["id"] = $ai;
	    $data_json["nombre"] = $an;
        $data_json["urlimg"] = $urlimg;	
        $data_json["precio"] =  $precio;
        $data_json["deposito"] = $deposito;			
        $data_json["categoria"] = $cn;	
	    $data[]=$data_json;	
    }

    // obtiene la cantidad de registros
    $cantidad_consulta = $con->query("select count(*) as total, categorias.nombre AS cn FROM articulos JOIN categorias ON categoria=categorias.id where categorias.nombre='$nombrecategoria' ORDER BY articulos.id");
    $row = $cantidad_consulta->fetch_assoc();
    $cantidad['cantidad']=$row['total'];

    $json["lista"] = array_values($data);
    $json["cantidad"] = array_values($cantidad);

    // envia la respuesta en formato json		
    header("Content-type:application/json; charset = utf-8");
    echo json_encode($json);

}else if(!isset($_POST["categoria"])){
    // obtiene los valores para realizar la paginacion
    $limit = isset($_POST["limit"]) && intval($_POST["limit"]) > 0 ? intval($_POST["limit"])	: 10;
    $offset = isset($_POST["offset"]) && intval($_POST["offset"])>=0	? intval($_POST["offset"])	: 0;

    // array para devolver la informacion
    $json = array();
    $query = $con->prepare("SELECT articulos.id AS ai, articulos.nombre AS an, urlimg, precio, deposito, categoria, categorias.id AS ci, categorias.nombre AS cn  FROM articulos  JOIN categorias ON categoria=categorias.id  ORDER BY articulos.id DESC limit ? offset ?");
    $query->bind_param("ii",$limit,$offset);
    $query->execute();     

    // // vincular variables a la sentencia preparada 
    $query->bind_result($ai, $an, $urlimg, $precio, $deposito, $categoria, $ci,$cn);

    // obtener valores 
    while ($query->fetch()) {
	    $data_json = array();
	    $data_json["id"] = $ai;
	    $data_json["nombre"] = $an;
        $data_json["urlimg"] = $urlimg;	
        $data_json["precio"] =  $precio;
        $data_json["deposito"] = $deposito;			
        $data_json["categoria"] = $cn;	
	    $data[]=$data_json;	
    }

    // obtiene la cantidad de registros
    $cantidad_consulta = $con->query("select count(*) as total from articulos");
    $row = $cantidad_consulta->fetch_assoc();
    $cantidad['cantidad']=$row['total'];

    $json["lista"] = array_values($data);
    $json["cantidad"] = array_values($cantidad);

    // envia la respuesta en formato json		
    header("Content-type:application/json; charset = utf-8");
    echo json_encode($json);
    // exit();
}

?>