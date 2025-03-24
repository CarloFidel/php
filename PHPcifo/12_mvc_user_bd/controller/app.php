<?php
require "../model/model.php";
require "../views/view.php";
require "functions.php";



function actionNuevoUsuario($con)
{
      if (("POST" === $_SERVER["REQUEST_METHOD"]) && isset($_REQUEST['registrar'])) { //Verifica que la solicitud sea de tipo POST y que el parámetro registrar esté presente en $_REQUEST (puede venir de $_POST o $_GET).

            $usuario = isset($_REQUEST['usuario']) ? $_REQUEST['usuario'] : ""; //Se obtienen los valores de usuario y email. Si no existen, se asigna una cadena vacía.
            $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : ""; 

            $usuario = saneadoreitor($usuario); //Se aplica la función saneadoreitor() (definida en functions.php) para limpiar los datos y evitar inyecciones de código.
            $email = saneadoreitor($email);




            list($rows, $ok) = modeloRegistrarNuevoUsuario($usuario, $email, $con); //Llama a modeloRegistrarNuevoUsuario(), que se encarga de verificar y registrar el usuario en usuarios.txt.
            if ($ok) { //Si el registro fue exitoso ($ok === true), llama a vistaRegistroCompletado().


             
                  vistaRegistroCompletado($usuario, $email, $rows);
                  
            } else { //Si el registro falló ($ok === false), llama a vistaRegistroIncorrecto().
                  vistaRegistroIncorrecto($usuario, $email);
                  
            }
      }
}


if (!isset($_REQUEST['registrar'])) { //Si no se ha enviado el parámetro registrar, se muestra el formulario con vistaMostrarFormularioRegistro().

      vistaMostrarFormularioRegistro();
} else { //Si registrar está presente, se llama a actionNuevoUsuario().
      actionNuevoUsuario($con);
}
