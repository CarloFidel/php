<?php
require_once "../view/lang.php";
require_once "../model/model.php";
require_once "../view/view.php";
require "functions.php";

function actionNuevoUsuario($con, $lang_form, $lang_feedback)
{
      if (("POST" === $_SERVER["REQUEST_METHOD"]) && isset($_REQUEST['registrar'])) {
            $error = '';

            $usuario = is_string($_REQUEST['usuario']) && preg_match('/^[A-Za-z ]{5,15}$/', $_REQUEST['usuario'])? $_REQUEST['usuario'] :'';
            if(empty($usuario)){
              $error = $lang_form['missatge_error'][0]; //error usuario
            }
            $email=filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL)? $_REQUEST['email']:'';
           if(empty($email)){
              $error = $lang_form['missatge_error'][1]; //error email
            }
            $password= strlen($_REQUEST['pwd'])>= 5 && strlen($_REQUEST['pwd'])<=8 && preg_match("/^[a-zA-Z0-9']+$/", $_REQUEST['pwd'])?$_REQUEST['pwd']:'';
            if(empty($pwd)){
              $error = $lang_form['missatge_error'][2]; //error password
            }

            if(empty($error)){
              $usuario = saneadoreitor($usuario);
              $email = saneadoreitor($email);
              $password = saneadoreitor($password);
            }
        
            //validar datos
            list($rows, $ok) = modeloRegistrarNuevoUsuario($usuario, $email, $password, $con);
            if ($ok) {
                  //Nos devuelve el modelo un true
                  vistaRegistroCompletado($usuario, $email, $password, $rows, $lang_feedback);
                  exit();
            } else {
              //Verificamos si el usuario o email ya existe. Modelo solo entrea el listado pedido
              $selectQuery = "SELECT * FROM usuarios WHERE usuario='$usuario' OR email = '$email'";
              $result = $con->query($selectQuery);
              if($result ->num_rows > 0){
                $error = $lang_form['missatge_error'][3];
              }else{
                $selectPasswordQuery = "SELECT password FROM usuarios";
                $result = $con->query($selectPasswordQuery);
                $password_exist=false;
                while($row=$result->fetch_assoc()){
                if(password_verify($password, $row['password'])){
                  $password_exist = true;
                  break;
                }
              }
              if($password_exist){
                 $error = $lang_form['missatge_error'][4];
              }
            }
          }
          vistaRegistroIncorrecto($usuario, $email, $password, $lang_form, $error);
          exit();

            
      }
}




if (!isset($_REQUEST['registrar'])) {
      vistaMostrarFormularioRegistro($lang_form);
} else {
      actionNuevoUsuario($con, $lang_form, $lang_feedback);
}
