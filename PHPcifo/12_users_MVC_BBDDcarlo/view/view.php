 <?php
require_once "../controller/app.php";

function vistaRegistroCompletado($usuario, $email, $rows)
{
$table = "<table>";

if (!empty($rows)) {
    foreach ($rows as $value) {
        $table .= "<tr><td>" . $value['id'] . "</td><td>" . $value['usuario'] . "</td><td>" . $value['email'] . "</td></tr>";
        $table .= "<tr><td colspan='3'><hr></td></tr>";  
    }
    $table .= "</table>";
}

$params = [
  "usuario" => $usuario,
  "email" => $email,
  "table" => $table,
];
mostrarTpls($params, "../view/tpls/feedback.tpl");
}

function vistaRegistroIncorrecto($usuario, $email)
{
      _vista_form_registro($usuario, $email, false);
}

function vistaMostrarFormularioRegistro()
{
      _vista_form_registro("", "", true, "");
}


function _vista_form_registro($usuario, $email, $primera_vez)
{
      $mensaje_error = "";
      $class_error = "";

      if (!$primera_vez) {
            $class_error = "error";
            $mensaje_error = "El formulario contiene errores. Corrígelos y vuelve a intentarlo.";
      }

      $params = [
            "usuario" => $usuario,
            "email" => $email,
            "class_error" => $class_error,
            "mensaje_error" => $mensaje_error,
      ];

      mostrarTpls($params, "../view/tpls/form.php");
}

function mostrarTpls($params, $archivo)
{

      $html = file_get_contents($archivo);
      foreach ($params as $key => $value) {
            $html = str_replace("{{::$key::}}", $value, $html);
      }

      echo $html;
}