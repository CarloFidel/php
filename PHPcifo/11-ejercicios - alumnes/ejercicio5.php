<!--  Ejercicio 5. Hacer un programa que muestre todos los numeros entre dos numeros
 * que nos lleguen por la URL($_GET) -->
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="ejercicio5.php" method="get">
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
echo "<h1>"."El primer numero es". " ". $_GET['num1']. " " ."y el segundo es". " ".$_GET['num2']."</h1>";
$num1 = $_GET['num1'];
$num2 = $_GET['num2'];
echo "<h2>Los números entre $num1 y $num2 son:</h2>";

for($i = $num1; $i<=$num2; $i++ ){
  echo $i. " , ";
}
}else{
  echo "<h1 style='color:red'>Introduce los números</h1>";
}
?>