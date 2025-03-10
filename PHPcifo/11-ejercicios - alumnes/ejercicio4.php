 
<!-- Ejercicio 4. Recoger dos numeros por la url(Parametros GET) y hacer todas las 
 * operaciones basicas de una calculadora(suma, resta, multiplicaion y division)
 * de esos dos numeros.
 -->
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="ejercicio4.php" method="get">
    <label for="">Ingrese número 1</label>
    <input type="number" name="num1" id="">
    <label for="">Ingrese número 2</label>
    <input type="number" name="num2" id="">
    <button type="submit">Submit</button>

  </form>
</body>
</html>
<?php
if(isset($_GET['num1']) && isset($_GET['num2']) && !empty($_GET['num1']) && !empty($_GET['num2'])){

echo "<h1>El primer numero es". " ". $_GET['num1']. " " ."y el segundo es". " ".$_GET['num2']."</h1>";
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
}else{
  echo "<h1 style='color:red'>Introduce los números</h1>";
}
?>
