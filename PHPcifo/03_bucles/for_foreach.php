<?php

function pDump($variable)
{
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
}

/* Bucle for
for(variable contador, condición, actualizando contador){
// instrucciones
}
*/

$resultado = 0;
for ($i = 0; $i <= 10; $i++) {
     $resultado += $i;
  /*   $resultado = $resultado + $i; */
    print("$resultado<br/>");
}
echo "<br/>";
pDump($resultado);
echo "<br/>";
echo "<h1>El resultado final es: $resultado</h1>";

// Ejemplo tabla multiplicar
?>
<form method="get" action="">
    <input type="number" name="numero" id="numero">
    <button type="submit">Enviar</button>
</form>
<?php

if (isset($_GET['numero']) && is_numeric($_GET['numero'])) {
    $numero = $_GET['numero'];
} else {
    $numero = 1;
}

echo "<h1>Tabla de multiplicar del número $numero</h1>";
$num = "";
for ($contador = 0; $contador <= 10; $contador++) {
    $num .= "$numero x $contador = " . ($numero * $contador) . "<br/>";
}
echo "$num<br/>";
pDump($num);

/* foreach ($varArray as $value) {
sentencias;
} */

echo "<hr/>";
$marcas_motos =["Honda", "Yamaha", "Suzuki", "Kawasaki", "Ducati"];

echo $marcas_motos[4] . "<br/>";
echo "$marcas_motos[2]<br/>";

foreach ($marcas_motos as $value) {
    echo "$value<br/>";
} 

/* foreach ($varArray as $key => $value) {
sentencias;
} */

echo "<hr/>";
$marcas_motos = ["Honda", "Yamaha", "Suzuki", "Kawasaki", "Ducati"];

foreach ($marcas_motos as $key => $value) {
    echo ($key + 1) . ": $value<br/>";
}

 echo "<hr/>";

$marcas_motos_asoc = [
    "Honda" => "Vmax",
    "Yamaha" => "Rd250",
    "Suzuki" => "S500",
    "Kawasaki" => "Kamikaze",
    "Ducati" => "Scarver500",
];

pDump($marcas_motos_asoc);

echo $marcas_motos_asoc["Yamaha"];
echo "<br/>";
echo $marcas_motos_asoc["Ducati"];
echo "<br/>";
$m = "";
foreach ($marcas_motos_asoc as $key => $value) {
    $m .= $key . ": $value<br/>";
}
echo $m;