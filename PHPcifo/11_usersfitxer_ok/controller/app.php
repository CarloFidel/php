<?php
require "../model/model.php";
require "../view/view.php";
require "functions.php";
//requerimos model porque necesitamos el modelo, la vista para presentar y functions para sanear


function actionNuevoUsuario()
{
      if (("POST" === $_SERVER["REQUEST_METHOD"]) && isset($_REQUEST['registrar'])) {

            $usuario = isset($_REQUEST['usuario']) ? $_REQUEST['usuario'] : "";
            $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : "";

            $usuario = saneadoreitor($usuario);
            $email = saneadoreitor($email);

            //llama a la funcion de modelo esperando un ok
            $ok = modeloRegistrarNuevoUsuario($usuario, $email);
            if ($ok) {
                   // si recibe ok, llama a la funcion vista y muestra los parametros
                  vistaRegistroCompletado($usuario, $email);
                  exit;
            } else {
                  vistaRegistroIncorrecto($usuario, $email);//si recibe false le llevamos a la vista para decirle que es incorrecto con otra funcion
                  exit;
            }
      }
}


if (!isset($_REQUEST['registrar'])) {
      vistaMostrarFormularioRegistro();
} else {
      actionNuevoUsuario();
}
