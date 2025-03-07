<?php
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
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <table id="videojuegos">
    <thead>
      <tr>
        <th>ACCION</th>
        <th>AVENTURA</th>
        <th>DEPORTES</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>GTA</td>
        <td>ASSASINS</td>
        <td>FIFA 21</td>
      </tr>
      <tr>
        <td>COD</td>
        <td>CRASH</td>
        <td>PES 21</td>
      </tr>
      <tr>
        <td>PUGB</td>
        <td>Prince of Persia</td>
        <td>MOTO GP 21</td>
      </tr>
    </tbody>
    </thead>
  </table>
</body>
</html>
<?php
session_start();
$arrayTabla = [
'ACCION' => ['GTA', 'COD', 'PUGB'],
'AVENTURA'=> ['ASSASINS', 'CRASH', 'Prince of Persia'],
'DEPORTES'=> ['FIFA 21', 'PES 21', 'MOTO GP 21'],
];

function pDump($arrayTabla){
  echo "<pre>";
  var_dump($arrayTabla);
  echo "</pre>";
}
pDump($arrayTabla);

print_r($arrayTabla['ACCION']);
$_SESSION['accion'] = $arrayTabla['ACCION'];
$_SESSION['aventura'] = $arrayTabla['AVENTURA'];
$_SESSION['deportes'] = $arrayTabla['DEPORTES'];