<?php
/*
Ejercicio 8. Hacer un programa en PHP que tenga un array con 8 numeros enteros no consecutivos ni ordenados y crear una función  que haga lo siguiente:
- Recorrerlo y mostrarlo al final del bucle imprimiendo la variable que contiene todo el recorrido
- Ordenarlo de menor a mayor y mostrarlo
- Mostrar su longitud (cuantos elementos tiene)
- Buscar algun elemento (buscar por el parametro que me llegue por la url)
- Mostrar el indice del elemento que buscamos
 */
$numerosEnteros = [1, 5, 8, 32, 7, 19, 2, 14];
echo "Los números son:". "<br>";
for ($i=0; $i<count($numerosEnteros); $i++) { 
  echo  $numerosEnteros[$i]."<br>";
}

echo "Los números ordenados de menor a mayor son:". "<br>";
sort($numerosEnteros);
for ($i=0; $i<count($numerosEnteros); $i++) { 
  echo  $numerosEnteros[$i]."<br>";
}
$cantElementos = count($numerosEnteros);
echo "La longitud del array es de $cantElementos elementos". "<br>";
