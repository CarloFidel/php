<?php
require_once 'controllers/UsuarioController.php';
header('Content-Type: application/json');

// Obtener datos JSON del cuerpo de la petición
$data = json_decode(file_get_contents('php://input'), true);

// Crear instancia del controlador
$controller = new UsuarioController();

// Si no hay datos POST, devolver todos los registros
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo $controller->index();
    exit;
}

// Procesar las diferentes acciones
switch ($data['action']) {
    case 'create':
        echo $controller->create($data);
        break;

    case 'update':
        echo $controller->update($data);
        break;

    case 'delete':
        echo $controller->delete($data);
        break;

    default:
        echo json_encode(['error' => 'Acción no válida']);
        break;
}
?> 