<?php
require_once "connect.php";
$id = $_REQUEST['id'];
$con->query("DELETE FROM datos_usuarios WHERE ID = '$id'");
header("Location: index.php");
