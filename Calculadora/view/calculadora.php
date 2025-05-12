<?php
session_start();
require_once '../view/view.php';
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Calcula</title>
    <link rel="stylesheet" href="../assets/calculadora2.css" />
  </head>
  <body>
    <section class="calculadora">
      <h1>Calculadora</h1>
      <form method="post" action="../controller/app.php">
        <input type="number" name="num1" placeholder="Número 1" required />
        <input type="number" name="num2" placeholder="Número 2" required />
       
        <div class="operaciones">
          <input type="radio" name="operacion" value="suma" required />Suma
          <input type="radio" name="operacion" value="resta" required />Resta
          <input
            type="radio"
            name="operacion"
            value="multiplicacion"
            required
          />Multiplicación
          <input
            type="radio"
            name="operacion"
            value="division"
            required
          />División
        </div>
        <button type="submit" name="calcular">Calcula</button>
      </form>
    </section>
  </body>
</html>
