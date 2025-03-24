<?php

require_once "../model/connect.php";

function modeloRegistrarNuevoUsuario($usuario, $email, $con) 
{
 
/*       if (empty($usuario) || empty($email)) { 
            return false;
      }
 */
      $myrows = [];
      $selectQuery = "SELECT * FROM usuarios WHERE usuario= '$nombre' OR email = '$email'";

      $result = $con->query($selectQuery);
      if($result->num_rows > 0) {
        return false;
      }
       $insertQuery = "INSERT INTO usuarios VALUES (NULL, '$usuario', '$email')";
       $result = $con->query($insertQuery);
    if($result){
      $selectallQuery = "SELECT * FROM usuarios";
      $result = $con->query($selectallQuery);
      while ($row = $result-> fetch_assoc()){
        $myrows[] = $row;
      }
      $con->close();
      return [$myrows, true];
    }else {
      return false;
    }
}
