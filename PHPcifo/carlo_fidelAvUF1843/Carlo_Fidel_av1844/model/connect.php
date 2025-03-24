<?php

$host = "localhost"; 
$user = "root"; 
$pass = ""; 
$bd = "user2025"; 

$con = new mysqli($host, $user, $pass, $bd);

if($con->connect_errno){ 
   die('Errorum de connexion (' . $con->connect_errno . ')' . 
   $con->connect_error);
}
echo "La base de dato está conectada" . " ". " " . $con->host_info;
