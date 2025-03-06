<?php
function pDump($variable)
{
  echo "<pre>";
  var_dump($variable);
  echo "</pre>";
}
$cantantes = ['josele Santiago', 'justin Sullivan', 'Chrissie Hyde'];
$numeros = [1, 2, 3, 4];
pDump($numeros);

//Ordenar

sort($numeros);
pDump($numeros);

pDump($cantantes);

sort($cantantes);
pDump($cantantes);

//Añadir elementos array

$cantantes[] = "Natos";
pDump($cantantes);
array_push($cantantes, "waor");
pDump($cantantes);
$cantantes[] = "otro";
pDump($cantantes);

//Eliminar elem
array_pop($cantantes);//ultimo elem
pDump($cantantes);

unset($cantantes[2]);
pDump($cantantes);
//Aleat
$indice = array_rand($cantantes);
//echo

//Clonar un array con merge(Unir)
$original = [1, 2, 3];
$copy = array_merge([], $original);
pDump($original);
pDump($copy);

$original = [1, 2, 3];
$copy = array_slice($original, 0); // This creates a copy of the original array
pDump($original); // Dumps the original array
pDump($copy); // Dumps the copied array (use the correct variable name)
//Comporobar un kay


//codificar un json("nom":"value")
$prueba1 = json_encode($animales);
echo "<be><hr/>";
pDump($prueba1);
echo "<be><hr/>";
echo $prueba1;
echo "<be><hr/>";
$prueba2 = json_encode($prueba1);
pDump($prueba2);
echo "<br><hr/>";

foreach ($prueba2 as $value) {
echo "$value<br/>";
}
//Crear array asociativo a partir de 2 arrays
$key = ['cielo', 'tierra', 'mar'];
$value = ['azul', 'verde', 'turquesa'];

$new_array = array_combine($key, $value);
pDump($new_array);
echo "<br><hr/>";

function alCubo($numero){
  return $numero*$numero*$numero;

}
$a = [1, 2, 3, 4, 5];
$result = array_map('alCubo', $a);
pDump($result);
echo "<br><hr/>";
/* array_map("param1:la funcion, param2: array a recorrer, Opcional rango a recorrer) */

range(1, 10);
$result2 = array_map(function ($n){
  return ($n*$n*$n);
}, $a);
pDump($result2);
echo "<br>";
$result3 = array_map(fn ($n) => $n*$n*$n, range($a[1], $a[3]));
pDump($result3);
echo "<br>";

$array = ['Apple', 'BANNANA', 'Mango', 'orange', 'GRAPES'];
$result = array_map(fn($element) => strtolower($element), $array);
pDump($result);
echo"<br>";

echo "<br>";
//null como prier param, permite llamar a la function callback y uni dos arrays en uno.
$employeeNames = ['jhon', 'mark', 'lisa'];
$employeeEMails = ['jhon@example.com', 'mark@example.com', 'lisa@example.com', 'uuu@example.com'];
$res = array_map(null, $employeeNames, $employeeEMails);
pDump($res);
echo"<br>";
//Coduficar como JSON {"nom":"value"}
$string_res = json_encode($res);
echo"<br>";
pDump($string_res);
echo"<br>";
echo $string_res;
echo"<br>";

$agenda = [
  ['nombre' => 'Pepe', 'email' => 'email@mail.com'],
  ['nombre' => 'Pepon', 'email' => 'otro@mail.com'],
  ['nombre' => 'jose', 'email' => 'mas@mail.com'],
  'nombre' => 'Antonio'
];
$agenda_string = json_encode($agenda);
echo "<br>";
pDump ($agenda_string);
echo "<br>";
echo $agenda_string;
