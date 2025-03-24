<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$bd = 'user2025';

$conexion = new mysqli($host, $user, $pass, $bd);

if($conexion->connect_errno){
  die('Errorum de connexion ('.$conexion->connect_errno.')'. $conexion_error);
}
