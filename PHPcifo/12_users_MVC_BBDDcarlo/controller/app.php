<?php
require_once "../model/model.php";
require_once "../view/view.php";
require_once "functions.php";

//requerimos model porque necesitamos el modelo, la vista para presentar y functions para sanear

function actionNuevoUsuario($conexion)
{
      if (("POST" === $_SERVER["REQUEST_METHOD"]) && isset($_REQUEST['registrar'])) {

            $usuario = isset($_REQUEST['usuario']) ? $_REQUEST['usuario'] : "";
            $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : "";

            $usuario = saneadoreitor($usuario);
            $email = saneadoreitor($email);

            //llama a la funcion de modelo esperando un ok
            list($rows, $ok) = modeloRegistrarNuevoUsuario($usuario, $email, $conexion);
            if ($ok) {
                   
                  vistaRegistroCompletado($usuario, $email, $rows);
                  
            } else {
                  vistaRegistroIncorrecto($usuario, $email);//si recibe false le llevamos a la vista para decirle que es incorrecto con otra funcion
                  
            }
      }
}


if (!isset($_REQUEST['registrar'])) {
      vistaMostrarFormularioRegistro();
} else {
      actionNuevoUsuario($conexion);
}
