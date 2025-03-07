<!-- Ejercicio 11. Crear un script en php que tenga 4 variables, una de tipo array,
 * otra de tipo string, otra int y otra booleana y que imprima un mensaje
 * segun el tipo de variable que sea cada una de las variables.
 -->
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="" method="POST">
    <select name="variables" id="">
      <option value="array">array</option>
      <option value="string">string</option>
      <option value="int">int</option>
      <option value="booleano">boolean</option>
    </select>
    <button type="submit" name="subm">Submit</button>
  </form>
</body>
</html>

<?php
$variabletipoArray = ["esto es un array", "este es el segundo elelmento", 34, "nombre" => "Juan"];
$variabletipoString = "esto es un string";
$variabletipoInt = 34;
$variabletipoBooleano = true; 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['subm']) ) {
    // Verificar si se ha enviado una opción
    if (isset($_POST['variables'])) {
        $opcionSeleccionada = $_POST['variables'];
    } 
}
switch ($opcionSeleccionada) {
    case "array":
        echo "La variable es de tipo". " ". gettype($variabletipoArray). "<br>";
        echo "Ejemplo: ";
        function pDump($variabletipoArray) {
            echo "<pre>";
            var_dump($variabletipoArray);
            echo "</pre>";}
            pDump($variabletipoArray);
        break;
    case "string":
        echo "La variable es de tipo". " ". gettype($variabletipoString). "<br>";
        echo "Ejemplo: ". "<br>";
        echo $variabletipoString;
        break;
    case "int":
        echo "La variable es de tipo". " ". gettype($variabletipoInt). "<br>";
        echo "Ejemplo: ". "<br>";
        echo $variabletipoInt;
        break;
    case "booleano":
        echo "La variable es de tipo". " ". gettype($variabletipoBooleano). "<br>";
        echo "Ejemplo: ". "<br>";
        echo $variabletipoBooleano;
        break;
    default:
        echo "La variable no es de ningun tipo";
        break;
}

?>
