<?php
session_start();
if (isset($_GET['lang'])) {
    if ("cast" == $_GET['lang']) {
        $_SESSION['idioma'] = "cast";
    } elseif ("cat" == $_GET['lang']) {
        $_SESSION['idioma'] = "cat";
    }
    
} elseif (!isset($_SESSION['idioma'])) {

    $_SESSION['idioma'] = "cat";
}
require "lang/".$_SESSION['idioma'].".php";

function cabecera($lang){
  require_once "./views/cabecera.tpl";
}

function menu($lang){
  echo "<a href='index.php'>" . $lang['m1'] . "</a> || <a href='producto.php'>" .$lang['m2'] . "</a>";
}

function principal($lang){
require_once "./views/principal.tpl";
}

function footer2($lang){
require_once "./views/footer.tpl";
}