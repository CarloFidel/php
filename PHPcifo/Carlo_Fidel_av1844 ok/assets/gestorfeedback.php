<?php
session_start();
 if (isset($_GET['canvi'])) {
    if ("cast" == $_GET['lang']) {
        $_SESSION['idioma'] = "cast";
    } elseif ("cat" == $_GET['lang']) {
        $_SESSION['idioma'] = "cat";
    }
    
require "../lang/".$_SESSION['idioma'].".php";
require_once "../model/model.php";
require_once "../views/feedback.tpl";

} 
