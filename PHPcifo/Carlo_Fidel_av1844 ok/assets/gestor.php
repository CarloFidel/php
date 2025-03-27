<?php
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
  require_once "./views/form.tpl";
}
