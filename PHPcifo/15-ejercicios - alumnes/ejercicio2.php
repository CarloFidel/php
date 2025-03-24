<?php

/* 
Ejercicio 2. Escribir un script en PHP que nos muestre por pantalla todos los
numeros pares que hay del 1 al 100.
*/

echo "Los números pares entre 1 y 100 son:" . "<br>";
function mostrarpar(){
$numero_par = [];
for($e = 0; $e <= 100; $e++){
if ($e % 2 == 0){
 $numero_par[] = $e. " , ";
};
}
foreach ($numero_par as $num) {
echo $num;
    }

}
mostrarpar();
echo "<br>";
echo "<br>";
echo "Los números impares entre 1 y 100 son:" . "<br>";
function mostrarImpar()
{
$numero_impar = [];
for($i = 0; $i <= 100; $i++){
if ($i % 2 !== 0){
 $numero_impar[] = $i. " , ";
};
}
foreach ($numero_impar as $numero) {
echo $numero;
}
}
mostrarImpar();
