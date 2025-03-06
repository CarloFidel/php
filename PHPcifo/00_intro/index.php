<?php
//Declaración de variables
$primera_var = "String o literal"; //string
$primer_numero = 50;  // number
$otro_numero = 50.32; //number
$numero_o_no = "50"; //string

print($primera_var);
echo "<br/>";
echo $primer_numero;
echo "<br/>";
$verdadero_o_no = true;

$falso_o_no = false;
echo $falso_o_no;
echo "<br/>";
echo $verdadero_o_no;
echo "<br/>";

$nombre = "Pepe";


$parrafada = "
<h1 style='font-size:30px; font-family:Arial'>Ejemplo: </h1>
<p>Donde se prueba la generación de la páginas desde PHP.<br/>
 Para corregir el problema de los saltos de linea, podemos poner retornos al final de la línea.
 <br>Hemos cambiado de línea.<br>Si queremos bajar a la línea siguiente, <strong> $nombre </strong> lo haremos con un &lt;br&gt; <br><strong><em>tag</em></strong> de tipo: <code>&lt;br/&gt;</code><code>&lt;br/&gt;</code>...<br/><br/>Observa<br/>como<br/>se<br/>hace. Y fíjate que podemos utilizar también texto en múltiples líneas en el código PHP, además de incluir tantos<strong><em> tags</em></strong> como deseemos.</p>";


echo $parrafada;
$html="<br> en Html.";

const NOMBRECONSTANTE = "Pepiño";
echo NOMBRECONSTANTE;
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Primer documento en Php y html</title>
    <style>
    p {
        color: red;
        font-family: Arial, Helvetica, sans-serif;
    }

    pre {
        border: 1px solid black;
        padding: 10px;
        margin: 10px;
        background-color: #EEE;
    }
    </style
</head>

<body>

    <h1>Introducción a Php embebido <?php echo $html; ?></h1>
    <h2>Introducción a Php embebido <?= $html; ?></h2>

    <?= $primera_var."<br>". $primera_var . " - " . $primer_numero . " - " . $otro_numero . " - " . $numero_o_no . " - " . $falso_o_no  . " - " .$verdadero_o_no . "<br>";?>

<?= "$primera_var <br> $primera_var - $primer_numero - $otro_numero - $numero_o_no - $falso_o_no - $verdadero_o_no <br>";
      echo gettype($primer_numero) . "<br>";
      echo gettype($otro_numero) . "<br>";
      echo gettype($numero_o_no) . "<br>";
      echo gettype($verdadero_o_no) . "<br>";
      echo gettype($falso_o_no) . "<br>";

      echo print_r($primera_var) . "<br>";
      echo var_dump($primera_var) . "<br>";

     $nom = "Pepon";
      define('NOMBRE', $nom); // comentario de una linea
     define('apellido', 'Perolillos');
      const OTRACONST = "Peroles"; // comentario de una linea
      echo '<p>' . NOMBRE . ' ' . apellido . ' y ' . OTRACONST . '</p>';
    ?>

    <pre>
      <code><?php
$a = "Hola";
      echo "<br/>
1-" , $a , "<br/>", 
"2-$a = Hola<br/>", 
'3-$a = Hola<br/>', 
"4-\$a = Hola<br/>", 
"5-\$a = \"Hola\"<br/>";
      echo "<hr/>";
      ?>

    </code>
</pre>

</body>

</html>