<?php

$host = "localhost";
$user = "root";
$pass = "";
$bd = "usuariosonpassword"; 

$con = new mysqli($host, $user, $pass, $bd);

if ($con->connect_errno) {
      die('Errorum de connexión  (' . $con->connect_errno . ') ' . $con->connect_error);
}
echo "Enhorabuena... conexión realizada." . $con->host_info;
