<?php

/* 
 Ejercicio 6. Mostrar una tabla de HTML con las tablas de multiplicar del 1 al 10.
 */
echo "<h1>Tabla de multiplicar del 10</h1>";
$numero = 10;
for($i = 1; $i<=10; $i++){
  $num = $numero * $i;
  echo  "10 * $i = ". $num. "<br>";
}