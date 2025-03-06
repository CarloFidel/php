<?php
function pDump($variable)
{
      echo "<pre>";
      var_dump($variable);
      echo "</pre>";
}

// Debuggear con var_dump() o print_r()
$nombre = "Òscar Perolillos";
pDump($nombre);

// Fechas
echo date('d-m-y');
echo "<br/>";
echo date('y-m-d');
echo "<br/>";
echo time(); //segundos desde 1-1-1970

// Matematicas
echo "<br/>";
echo "Raiz cuadrada de 10: " . sqrt(10);
echo "<br/>";
echo "Raiz cuadrada de 10: " . number_format(sqrt(10), 2);

echo "<br/>";
echo "Número aleatorio entre 10 y 40: " . rand(10, 40);

echo "<br/>";
echo "Número pi: " . pi();

echo "<br/>";
echo "Número pi: " . number_format(pi(), 2);

echo "<br/>";
echo "Redondear: " . round(7.891234, 2); // y redondea arriba o abajo pero modifica el valor
//fijar como string
$valor = 100.56789;
echo "<br/>";
echo "$valor, sin fijar decimales";
echo bcdiv($valor, '1', 1); //divide un valor entre 1 y devuelve los carácteres (string) que se necesiten
echo "<br/>";
echo bcdiv($valor, '1', 2);
echo "<br/>";
echo bcdiv($valor, '1', 3);
echo "<br/>";
echo bcdiv($valor, '1', 4);
//fijar como número
$valor = 100.56789;
echo "<br/>";
echo "$valor, sin fijar decimales";
echo "<br/>";
echo number_format($valor, 1); //divide un valor entre 1 y devuelve los carácteres que se necesiten
echo "<br/>";
echo number_format($valor, 2);
echo "<br/>";
echo number_format($valor, 3);
echo "<br/>";
echo number_format($valor, 4);

// Más funciones generales
echo "<br/>";
$nombre2="Pepe";
echo gettype($nombre2);

// Detectar tipado
echo "<br/>";
if (is_string($nombre2)) {
      echo "Esa variable es un string";
}

echo "<br/>";
if (!is_float($nombre2)) {
      echo "La variable nombre2 no es un numero con decimales";
}
if (!is_numeric($nombre2)) {
      echo "La variable nombre2 no es un numero";
}

// Comprobar si existe una variable
echo "<br/>";
if (isset($nombre2)) {
      echo "La variable existe";
} else {
      echo "La variable no existe";
}

// Limpar espacios
echo "<br/>";
$frase = "         mi contenido         ";
pDump(trim($frase));
pDump($frase);

// Eliminar variables / indices
$year = 2025;
echo var_dump($year);
unset($year);//elimina la variable
/*  var_dump($year); */

// Comprobar variable vacia
$texto = "        hh       ";
echo "<br/>";
if (empty(trim($texto))) {
      echo "La variable texto esta vacia";
} else {
      echo "La variable texto TIENE CONTENIDO";
}
echo "<br/>";

// Contar caracteres de un string
$cadena = "12345";
echo strlen($cadena);
echo "<br/>";

// Encontrar caracter
$frase = "La vida es bella";
echo strpos($frase, "a");
echo "<br/>";

// Reemplazar palabras de un string
$frase = str_replace("vida", "moto", $frase);
echo $frase;
echo "<br/>";

// MAYUSCULAS Y minusculas
echo strtoupper($frase);
echo "<br/>";
echo strtolower($frase);
/* //funciones para limpiar valores recogidos en inputs
//límpio espacios o carácteres a ambos lados */
echo "<br/>";
$data1 = "       \r\t Este texto es de prueba\t \.   ";
$data2 = "  \r\t  Este también      ";
echo $data1 . "<br>";
echo $data2 . "<br>";

$trimmed1 = trim($data1);
$trimmed2 = trim($data2);

echo $trimmed1 . "<br>";
echo $trimmed2;
echo "<br/>";
echo "<br/>";
$data = "      \tEste texto es de prueba\t \.   ";

function sanitize($data)
{
        trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        print $data;
}
sanitize($data);

