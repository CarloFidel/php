<?php

/* 
 Ejercicio 1. Crear dos variables "pais" y "continente" y mostrar su valor por pantalla(imprimir)
 Poner en un comentario que tipo de dato tienen.
 */
 if (isset($_POST['pais']) && isset($_POST['continente']) && !empty($_POST['pais']) && !empty($_POST['continente'])){
  $pais = $_POST['pais'];
  $continente = $_POST['continente'];

    echo "<h1 id='resultado'>El país es $pais y el continente es $continente</h1>";
    echo "<h2>El tipo de dato de". " ". $pais. " ".  "es: ".gettype($pais)."</h2>";
    echo "<h2>El tipo de dato de". " ". $continente. " ".  "es: ".gettype($continente)."</h2>";
  }
    ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <div >
  <form action="" style="display: flex; flex-direction: column;" method="post">
    <label for="">Pais</label>
    <input type="text" style="width: 8rem; margin:0.5rem" name="pais">
    <label for="">Continente</label>
    <input type="text" style="width: 8rem; margin:0.5rem" name="continente">
    <button type="submit" name="subBut" style="width: 5rem;">Ejecuta</button>
  </form>
  </div>
</head>
<body>
  
</body>
</html>