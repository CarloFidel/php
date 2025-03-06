<?php
require_once "assets/functions.php";
//visat de resultado que muestra desde el controller lo necesario
$nombre = sanadoreitor($_POST['nombre']);
$apellidos = sanadoreitor($_POST['apellidos']);
$edad = sanadoreitor((int)$_POST['edad']);
$email = sanadoreitor($_POST['email']);
$pass = sanadoreitor($_POST['pass']);

//si hay errores vuelve a la visat index con los mensaje de feedback.php

if ('ok' != $error) {
  header("Location: ../index.php?error=$error");
}

session_start();
$_SESSION['nombre'] = $nombre;
$_SESSION['apellidos'] = $apellidos;
$_SESSION['edad'] = $edad;
$_SESSION['email'] = $email;
$_SESSION['pass'] = $pass;

require_once "views/feedback.tpl";
?>