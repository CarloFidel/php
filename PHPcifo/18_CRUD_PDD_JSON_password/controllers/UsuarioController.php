<?php
require_once 'models/Connection.php';
require_once 'models/Usuario.php';

class UsuarioController
{
    private $db;
    private $usuario;

    public function __construct()
    {
       $connection = new Connection();
        $this->db = $connection->getConnection();
        $this->usuario = new Usuario($this->db);
    }

    public function index()
    {
      $stmt = $this->usuario->read();
      $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return json_encode($usuarios);
    } 

    public function create($data)
    {    //Validar datos
        if (empty($data['nombre']) || empty($data['apellido']) || empty($data['email']) || empty($data['password'])) {
            return (["error" => 'Faltan campos requeridos']);
        }
        //Validar email 
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            return (["error" => 'El formato del email no es válido']);
        }

        //Asignar valores
        $this->usuario->nombre = $data['nombre'];
        $this->usuario->apellido = $data['apellido'];
        $this->usuario->email = $data['email'];
        $this->usuario->password = password_hash($data['password'], PASSWORD_DEFAULT, ["cost" => 14]);
        $this->usuario->tipo_usuario = $data['tipo_usuario'] ?? 2; // Por defecto, asignamos el tipo de usuario 2 

        if ($this->usuario->create()) {
            return ["mensaje" => 'Usuario creado correctamente'];            
        }
            return ["error" => 'no se puede crear el usuario'];            
    }

    public function update($data) {
      if(empty($data['id'])){
        return["error" => "El formato del email no es válido"];
      } 
      //Validar email
      if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        return (["error" => 'El formato del email no es válido']);
      }
      //Asignar valores
      $this->usuario->id = $data['id'];
      $this->usuario->nombre = $data['nombre'];
      $this->usuario->apellido = $data['apellido'];
      $this->usuario->email = $data['email'];

      if(!empty($data['password'])){
        $this->usuario->password = password_hash($data['password'], PASSWORD_DEFAULT, ["cost" => 14]);
      } 
      if(isset($data['tipo_usuario'])){
        $this->usuario->tipo_usuario = $data['tipo_usuario'];
        }
        if($this->usuario->update()){
          return ["mwnsajwe" => 'Usuario actualizado correctamente'];
        }
        return ["error" => 'no se puede actualizar el usuario'];
    }

    public function delete($data) {
      $this->usuario->id = $data['id'];

      if ($this->usuario->delete()) {
          return ["mwnsajwe" => 'Usuario eliminado correctamente'];
      }
        return ["error" => 'no se pudo eliminar el usuario'];
    }
  }
  ?>