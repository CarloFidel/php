<?php
require_once "config.php";

/* $host = "localhost";
$user = "root";
$pass = "";
$bd = "users2023";
$con = new mysqli($host, $user, $pass, $bd); */
$con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($con->connect_errno) {
      die('Errorum de connexión  (' . $con->connect_errno . ') ' . $con->connect_error);
}
echo "Enhorabuena... conexión realizada." . $con->host_info;
