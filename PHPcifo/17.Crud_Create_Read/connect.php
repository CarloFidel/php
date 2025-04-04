<?php
$typedb = "mysql"; 
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "pruebas"; 
$pw = "";

try {
      $con = new PDO($typedb . ":host=" . $host . ";dbname=" . $dbname . ";charset=UTF8mb4", $user, $pw);
/*       $con = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=UTF8mb4", DB_USER, DB_PASS);
 */      echo "OLE!!!";
} catch (PDOException $exception) {
      echo $exception->getMessage();
}
