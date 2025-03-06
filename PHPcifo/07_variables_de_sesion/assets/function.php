<?php
function pDump ($variable){
  echo "<pre>";
  echo "<code>";
  var_dump($variable);
  echo "</code>";
  echo "</pre>";
}

$normal_var = "yo soy una variable normal de toda la vida";

// Call pDump function to display the variable content
pDump($normal_var);
?>