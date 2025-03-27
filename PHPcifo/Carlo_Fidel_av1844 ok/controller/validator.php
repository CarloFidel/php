<?php
session_start();
require "../model/model.php";

if ("POST"===$_SERVER["REQUEST_METHOD"] && isset($_POST["enviar"])) {
    if (
      !empty($_POST["nombre"]) && 
      !empty($_POST["email"])
    ) {
      $error = 'ok';
      (!is_string($_POST['nombre']) || !preg_match("/^[A-Z][a-zA-Z0-9 ]{4,14}$/", $_POST['nombre'])) ? $error = 'nombre' : '';
      (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) ? $error = "email" : '';
    }else{
      $error = "ERROR";
    }
}

require_once "../views/form_procesado.php";
