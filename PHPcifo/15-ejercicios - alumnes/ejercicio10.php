<?php
/*
Ejercicio 10. Crear una sesión que aumente su valor en uno o dismuya en uno en función de si el parametro get counter está a uno o a cero.
 */
session_start();
if(!isset($_SESSION['counter'])){
  $_SESSION['counter']=0;
}
if($_GET['counter'] == true){
  $_SESSON['counter']++;
}
if($_GET['counter'] == false){
  $_SESSON['counter']--;
}