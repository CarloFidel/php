<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>prueba</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <form class="formulario" action="" method="POST">
      <div class="container">
        <h1>Buscador de pictogramas</h1>
        <label for="busca">Buscar pictograma:</label>
        <input type="text" id="busca" name="busca" value="<?php echo isset($_POST['busca']) ? htmlspecialchars($_POST['busca']) : ''; ?>" />
        <input type="hidden" name="picto" value="1" />
        <button id="enviar" type="submit" name="buscar_picto">Buscar</button>
      </div>
    </form>
    <script src="script.js"></script>
  </body>
</html>
<?php
if ("POST"===$_SERVER['REQUEST_METHOD'] && isset($_POST['picto'])) {
  $keyword = is_string($_REQUEST['busca'])? $_REQUEST['busca'] :'';
  echo "<h1>Buscador desde formulario de pictogramas</h1>";
  $urlContents = file_get_contents("https://api.arasaac.org/api/pictograms/es/search/$keyword");
  $array = json_decode($urlContents, true);
/* echo "<pre>";
print_r($array);
echo "</pre>";
die();
 */  echo "<br>";
    foreach ($array as $value) {
        $id = $value['_id'];
        $urlPicto = "https://api.arasaac.org/api/pictograms/$id?download=false";
        foreach ($value['keywords'] as $keywordData) {
            $palabra = $keywordData['keyword'];
        }

        echo "<div class='pictoBuscado'><img class='imgpictoBuscado' id='buscado_$id' src='$urlPicto'><br><span>ID: $id</span><br> $palabra</div>";

    }};
?>
