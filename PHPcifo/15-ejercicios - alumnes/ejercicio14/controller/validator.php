<?php
//Recibe los datos de la vista; los valida en formato como controller para enviarlos al modelo
if ("POST"===$_SERVER["REQUEST_METHOD"] && isset($_POST["enviar"])) {
    if (
      !empty($_POST["examen1"]) && !empty($_POST["examen2"]) && !empty($_POST["examen3"]) && 
      !empty($_POST["examen4"]) && !empty($_POST["examen5"])
    ) {
      $error = 'ok';
      (!filter_var($_POST['examen1'], FILTER_VALIDATE_INT)) ? $error = "examen1" : '';
      (!filter_var($_POST['examen2'], FILTER_VALIDATE_INT)) ? $error = "examen2" : '';
      (!filter_var($_POST['examen3'], FILTER_VALIDATE_INT)) ? $error = "examen3" : '';
      (!filter_var($_POST['examen4'], FILTER_VALIDATE_INT)) ? $error = "examen4" : '';
      (!filter_var($_POST['examen5'], FILTER_VALIDATE_INT)) ? $error = "examen5" : '';
    }else{
      $error = "ERROR";
    }
  
}
//Enviará el resultado a la vista
require_once "../notas_procesadas.php";