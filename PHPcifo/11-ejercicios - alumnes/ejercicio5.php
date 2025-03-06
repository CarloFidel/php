<?php

/* 
 Ejercicio 5. Hacer un programa que muestre todos los numeros entre dos numeros
 * que nos lleguen por la URL($_GET)
 */

function pDump($variable)
{
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
}

echo "<h1>"."El primer numero es". " ". $_GET['num1']. " " ."y el segundo es". " ".$_GET['num2']."</h1>";
pDump($_GET);
$num1 = $_GET['num1'];
$num2 = $_GET['num2'];
echo "<h2>Los números entre $num1 y $num2 son:</h2>";

for($i = $num1; $i<=$num2; $i++ ){
  echo $i. "<br>";
}
