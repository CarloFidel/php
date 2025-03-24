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
function pDump($numerosEnteros)
{
      echo "<pre>";
      var_dump($numerosEnteros);
      echo "</pre>";
}
pDump($numerosEnteros);
echo "Los números ordenados de menor a mayor son:". "<br>";
sort($numerosEnteros);
for ($i=0; $i<count($numerosEnteros); $i++) { 
  echo  $numerosEnteros[$i]."<br>";
}
echo "La longitud del array es: ". "<br>";
$cantElementos = count($numerosEnteros);
print($cantElementos. " ". "elementos". "<br>");
/*
Ejercicio 9. Escribir un programa con PHP que añada valores a un array ya existente ,mientras que su longuitud sea menor a 15 y luego mostrarlo por pantalla.
 */

/*
Ejercicio 10. Crear una sesión que aumente su valor en uno o dismuya en uno en función de si el parametro get counter está a uno o a cero.
 */

/*
Ejercicio 11. Crear un script en php que tenga 4 variables, una de tipo array,
 * otra de tipo string, otra int y otra booleana y que imprima un mensaje
 * segun el tipo de variable que sea cada una de las variables.

 */

/*
Ejercicio 12.
Crear un array con el contenido de la tabla:
ACCION   AVENTURA   DEPORTES
GTA      ASSASINS    FIFA 21
COD      CRASH       PES 21
PUGB     Prince of   MOTO GP 21
persia

Cada fila debe ir en un fichero separado(requires o includes).

 */

/*      Ejercicio13.
Escribir un programa que pida la nota de 5 exámenes en un primer html o php como formulario y muestre la calificación obtenida en cada uno en otro archivo.
Luego mostrará la media obtenida y volverá al primero borrando los controles para volver a entrar notas nuevas.<br>
El programa lanzará mensajes de error cuando  al enviar los datos de los controles de algúna nota no cumpla con las condiciones deseadas. <br>
La calificación podrá ser:</p>
<ul>
<li>Suspenso: < 5 < /li>
<li>Aprobado: > 5 y < 7< /li>
<li>Notable: >7 y < 9< /li>
<li>Excelente: >9 y < 10< /li>
<li>Matrícula de honor: 10</li>
</ul>
 */
/*      Ejercicio14.
Programa igual al 13  pero con tpls y MVC
 */
