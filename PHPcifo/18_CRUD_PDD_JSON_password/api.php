<?php
header ('Content-Type: application/json; Charset=UTF-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Acces-Control, Allow-Headers, Authorization, X-Requested-With');

require_once 'models/Connection.php';
require_once 'controllers/UsuarioController.php';

$controller = new UsuarioController();

// Si es una peticion tipo GET, devolvemos todos los usuarios
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo $controller->index();
    exit;
}

// Si es una peticion tipo POST, procesamos la accion
if($_SERVER['REQUEST_METHOD'] === 'POST') {
  //Obtenemos los contenidos del body
  $data = json_decode(file_get_contents('php://input'), true);

  // Verificamos si la acción está definida
  if (!isset($data['action'])) {
    echo json_encode(['error' => 'Acción no especificada']);
    exit;
  }

  // Procesamos la acción
  switch ($data['action']) {
    case 'create':
      //Validamos que todos los campos requeridos estén presentes
      if (!isset($data['nombre']) || !isset($data['apellido']) || !isset($data['email']) || !isset($data['password'])) {
        echo json_encode(['error' => 'Faltan campos requeridos']);
        exit;
      }

      //Validamos tipos de usuario
      if (!isset($data['tipo_usuario']) || !in_array($data['tipo_usuario'], [1,2,3])){
        $data['tipo_usuario'] = 2; // Por defecto, asignamos el tipo de usuario 1
      } 

      $result = $controller->create($data);

      //Verificamos si el resultado contione un error
      if (isset($result['error'])) {
        http_response_code(400); // Código de error 400 Bad Request
        echo json_encode($result);
      }else{
        http_response_code(200); // Código de éxito 201 Created
        echo json_encode($result);
      }
      break;
    case 'update':
      //validamos que el ID esté presente
      if (!isset($data['id'])) {
        echo json_encode(['error' => 'ID no especificado']);
        exit;
      }

      $result = $controller->update($data);

      //Verificamos si el resultado contione un error
      if (isset($result['error'])) {
        http_response_code(400); // Código de error 400 Bad Request
        echo json_encode($result);
     }else{
        http_response_code(200); // Código de éxito 200 OK
        echo json_encode($result);
      }
      break;
      case 'delete':
        //validamos que el ID esté presente
        if (!isset($data['id'])) {
          echo json_encode(['error' => 'ID no especificado']);
          exit;
        }
  
        $result = $controller->delete($data);
  
        //Aseguramos que el resutado sea un array asociativo
        if (is_string($result)) {
          $result = json_decode($result, true);
        }
        echo json_encode($result);
        break;

      default:
        echo json_encode(['error' => 'Acción no válida']);
        break;
        }
        exit;
}
 // Si no es una petición GET o POST, devolvemos un error
 echo json_encode(['error' => 'Método no permitido']);
 ?>








