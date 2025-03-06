<?php

/* 
Ejercicio 4. Recoger dos numeros por la url(Parametros GET) y hacer todas las 
 * operaciones basicas de una calculadora(suma, resta, multiplicaion y division)
 * de esos dos numeros.
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

$suma = $num1 + $num2;
$resta = $num1 - $num2;
$multi = $num1 * $num2;
$division = $num1 / $num2;

echo "la suma de". " ". $num1. " + " .$num2. " = ". $suma;
echo "<br>";
echo "la resta de". " ". $num1. " - " .$num2. " = ". $resta;
echo "<br>";
echo "la multiplicación de". " ". $num1. " * " .$num2. " = ". $multi;
echo "<br>";
echo "la división de". " ". $num1. " / " .$num2. " = ". round($division,1);
