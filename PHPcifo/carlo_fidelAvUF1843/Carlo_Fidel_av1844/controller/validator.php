<?php
require "../model/model.php";
//Recibe los datos de la vista; los valida en formato como controller para enviarlos al modelo
if ("POST"===$_SERVER["REQUEST_METHOD"] && isset($_POST["enviar"])) {
    if (
      !empty($_POST["nombre"]) && 
      !empty($_POST["email"])
    ) {
      $error = 'ok';
      (!is_string($_POST['nombre']) || preg_match("/[0-15 ]/", $_POST['nombre'])) ? $error = 'nombre' : '';
      (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) ? $error = "email" : '';
    }else{
      $error = "ERROR";
    }
}
//Enviará el resultado a la vista
require_once "../form_procesado.php";