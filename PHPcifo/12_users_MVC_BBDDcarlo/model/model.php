<?php
//conexion a la base de datos
require_once "../model/connect.php";

function modeloRegistrarNuevoUsuario($usuario, $email, $conexion)
{
      //recibe dos parametros si estan vacios devolvemos falso
      if (empty($usuario) || empty($email)) {
            return false;
      }
      
      $myrows =[];
       
      //hemos construido la consula
      $selectQuery = "SELECT * FROM usuarios WHERE usuario = '$usuario'  OR email='$email'";

      //hacemos la consulta, si ya existe devolvemos false
      $result = $conexion->query($selectQuery);{
        if($result->num_rows>0){
          return false;
        }
      }

      $insertQuery ="INSERT INTO usuarios VALUES (null, '$usuario', '$email')";
      $result = $conexion->query($insertQuery);
       
      if($result){
      $selectallQuiery = "SELECT * FROM usuarios";
      $result = $conexion->query($selectallQuiery);
      while($row = $result->fetch_assoc()){//fecth_assoc mientras el resultado sea asociativo
        $myrows[]=$row;
      }
      $conexion->close();
      return [$myrows, true];
      }else{
        return false;
      }  
      }
