<?php
if (("GET" === $_SERVER["REQUEST_METHOD"]) && isset($_REQUEST['action']) && $_REQUEST['action'] === 'volver') {
    header("Location: ../index.php");
    exit();
}
