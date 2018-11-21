<?php

$con = mysqli_connect("localhost","root","","tiendaexelente") or die ("Problemas con la conexión a la base de datos");
$acentos = $con->query("SET NAMES 'utf8'");//para que los datos recibidos este en formato utf8
// echo 'conectado';