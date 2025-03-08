<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="ejercicio7.php" method="get">
    <label for="">Ingrese número 1</label>
    <input type="number" name="num1" id="">
    <label for="">Ingrese número 2</label>
    <input type="number" name="num2" id="">
    <button type="submit">Submit</button>

  </form>
</body>
</html>
<?php
/* 
 Ejercicio 7. Hacer un programa que muestre todos los numeros IMPARES entre dos numeros
 * que nos lleguen por la URL($_GET)
 */

echo "<h1>"."El primer numero es". " ". $_GET['num1']. " " ."y el segundo es". " ".$_GET['num2']."</h1>";
$num1 = $_GET['num1'];
$num2 = $_GET['num2'];
$num_impar = [];

echo "<h2>Los números impares entre". " ". $num1. " y ".$num2. " son:"."</h2>". "<br>";
function impar($num1, $num2){
for($i = $num1+1; $i<=$num2; $i++ ){
  if($i % 2 !== 0){
    $num_impar[] = $i;
  }
} foreach ($num_impar as $numero) {
 echo $numero. ", ";
    }
}impar($num1, $num2);