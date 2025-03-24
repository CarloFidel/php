<?php
require_once "assets/functions.php";
session_start();

if(isset($_GET['error'])){
  $error = $_GET['error'];

  $nombre = $_SESSION['nombre'];
  $email = $_SESSION['email'];

  echo ('ERROR' == $error) ? '<strong style="color:red">Introduce los datos en todos los campos del formulario</strong>' : '';
  echo ('nombre' == $error) ? '<strong style="color:red">Introduce bien el nombre</strong>' : '';
  echo ('email' == $error) ? '<strong style="color:red">Email incorrecto</strong>' : '';
}
