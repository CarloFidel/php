<?php
/* echo "<h1>Buscador desde formulario de pictogramas</h1>";
  $urlContents = file_get_contents("https://api.arasaac.org/api/pictograms/es/search/lechuga");
  $json = json_decode($urlContents, true);
  $id = $json[0]['_id'];
  echo "<br>";
  echo $id;
  $urlPicto = "https://api.arasaac.org/api/pictograms/$id?download=false";
  echo "<br>";
  echo '<img src="'.$urlPicto.'">'; 
  echo "<br>";
  echo "<br>";
  echo "<br>";
 */
  

if ("POST"===$_SERVER['REQUEST_METHOD'] && isset($_POST['picto'])) {
  $keyword = is_string($_REQUEST['busca'])? $_REQUEST['busca'] :'';
  echo $keyword;
  echo "<h1>Buscador desde formulario de pictogramas</h1>";
  $urlContents = file_get_contents("https://api.arasaac.org/api/pictograms/es/search/$keyword");
  $array = json_decode($urlContents, true);
  echo "<br>";
foreach ($array as $value) {
    if (isset($value['_id'])) {
    $id = $value['_id'];
  $urlPicto = "https://api.arasaac.org/api/pictograms/$id?download=false";
    echo "<div style='text-align: center;'>";
    echo "<img class='pictoBuscado' id='buscado_$id' src='$urlPicto'><br>";
    echo "<span>ID: $id</span>";
    echo "</div>";
}else{
  echo "<br>";
  echo "no hay pictogramas con esta palabra";
  echo "<br>";
}
}else{
  echo "<br>";
  echo "no hay pictogramas con esta palabra";
  echo "<br>";};
}else{
  echo "<br>";
  echo "escriba una palabra válida";
  echo "<br>";
};