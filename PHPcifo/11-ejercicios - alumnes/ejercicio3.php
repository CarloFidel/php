<?php

/* 
 Ejercicio 3. Escribir un programa que imprima por pantalla los cuadrados
 (un numero multiplicado por si mismo) de los 40 primeros numeros naturales.
 PD: Utilizar bucle while y for.
 */
echo "<h1>Cuadrados</h1>";
function cuadrado(){
  for($i = 0; $i <= 40; $i++){
    $num[] = $i;
}    foreach ($num as $numero) {
     echo "El cuadrado de". " ". $numero. " es ".  $numero*$numero . "<br>";}


}cuadrado();




