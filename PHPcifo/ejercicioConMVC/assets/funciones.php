<?php
//{error_reporting(E_ERROR);
// desactivar toda la notificacion de error
// error_rerting(0);
// notificar solament errores de ejecucion
// error_reporting(E_ERROR | E_PARSE | E_NOTICE);
// notificar todos los errores excepto E_NOTICE
// este es el valor predeterminado establecido en php.ini
// error_reporting(E_ALL)
// notficar todos los errores de php
// error_reporting(-1);
// lo mism que error_reporting(E_ALL);
// init_set('error_reporting', E_ALL);
// header("content-type-text/;charset=\"utf-8\"");}
$prevision="";
$error="";
if($_SERVER["REQUEST_METHOD"]==="GET" && !empty($_GET['ciudad'])){
  $ciudad = $_GET['ciudad'];
  $ciudad = isset($ciudad)? $ciudad:"";
  $urlContents = @file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=$ciudad&appid=c425aa48584ba8ac76b6ec738a35b2fe&units=metric&lang=es");
  if(!$urlContents){
    $error = "no hemos encontrado la ciudad";
  }else{
    $array = json_decode($urlContents, true);

    $prevision ="El tiempo en " . $ciudad . " es actualmente '" . $array['weather'][0]['description'] . "' .<br> ";
    $temperaturaEnCelsius = $array['main']['temp'];
    $prevision .= "La temperatura es " . intval($temperaturaEnCelsius). "&deg;C.";
    $tempMin = $array['main']['temp_min'];
    $tempMax = $array['main']['temp_max'];
    $prevision .= " oscilando entre " . intval($tempMin) . "&deg;C de minima y " . intval($tempMax) . "&deg;C de máxima.";
  }
}
?>
