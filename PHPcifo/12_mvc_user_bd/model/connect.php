<?php

$host = "localhost"; //maquina que aloja  la base de datos
$user = "root"; //permisos para gestionar la base de datos
$pass = ""; //contraseña para acceder a la base de datos
$bd = "users2025"; //nombre de la base de datos


$con = new mysqli($host, $user, $pass, $bd);

if($con->connect_errno){ //errno = error number
   die('Errorum de connexion (' . $con->connect_errno . ')' . 
   $con->connect_error);
}
echo "Enhorabuena...conexion realizada" . $con->host_info;
