<?php
$lang="";
if(isset($_GET['lang'])){
  if($_GET['lang']== "cast"){
    $lang = "Variabe escrita en castelano";
  }
  if($_GET['lang']== "cat"){
    $lang = "Variabe escrita en català";
  }
}

echo "<br>";
echo $lang;
echo "<br>";
?>
<a href="?lang=cast">es</a> || <a href="?lang=cat">cat</a>
