<?php
session_start();
require_once '../model/model.php';
require_once '../view/calculadora.php';
require_once '../view/view.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $error = "";
    $num1 = $_POST['num1'];
      if (empty($num1)) {
      $error = "Escribe el primer número";

      }
    $num2 = $_POST['num2'];
          if (empty($num1)) {
      $error = "Escribe el segundo número";

      }

    $operacion = $_POST['operacion'];

    $calculadora = new Calculadora();
    $resultado = $calculadora->calcular($num1, $num2, $operacion);

    header("Location: ../view/resultado.php?resultado=" . $_SESSION['resultado'] = $resultado);  
    exit();
}

