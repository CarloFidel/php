<?php
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enviar'])){
      if (
      !empty($_POST["examen1"]) && !empty($_POST["examen2"]) && !empty($_POST["examen3"]) && 
      !empty($_POST["examen4"]) && !empty($_POST["examen5"]);
    ){
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
require_once "../notas_procesadas.php";