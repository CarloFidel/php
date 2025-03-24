<?php

if (isset($_GET['lang'])) {
    if ("cast" == $_GET['lang']) {
        $lang = "cast";
    } elseif ("cat" == $_GET['lang']) {
        $lang= "cat";
    }
    
} elseif (!isset($_GET['lang'])) {
    $lang = "cat";
}

require "lang/".$lang.".php";

function cabecera($lang){
    require_once "./views/headerIndex.php";
  }

function form($lang){
    require_once "./views/form.php";
}

function menu($lang){
    require_once "./views/footer.php";
  }