 <?php

  require_once 'C:\xampp\htdocs\Restaurante\models\Usuario.php'; 
  class UsuarioController
  {
    private $model;

    public function __construct()
    {
      $this->model = new Usuario();
    }

    public function login()
    {
      $this->model->setCorreo($_POST['correo']);
      $this->model->setClave($_POST['clave']);
      $this->model->login();
      //si hay algo en error en el modelo retornarlo
      if ($this->model->getError()) {
        return $this->model->getError();
      }
    }
    public function index()
    {
      $registros = $this->model->searchUser();
      return $registros;
    }

    public function create()
    {
      $this->model->setNombre($_POST['nombre']);
      $this->model->setApellido($_POST['apellido']);
      $this->model->setCedula($_POST['Documento']);
      $this->model->setTelefono($_POST['telefono']);
      $this->model->setCorreo($_POST['correo']);
      $this->model->setClave($_POST['clave']);
      $this->model->setRol($_POST['IdRol']);
      if ($this->model->RegistrarUser()) {
        header('Location: /Restaurante/views/admin/usuarios/BuscarUsuario.php');
      }
    }
    public function edit()
    {
      $this->model->setId($_GET['id']);
      $this->model->setNombre($_POST['nombre']);
      $this->model->setApellido($_POST['apellido']);
      $this->model->setCorreo($_POST['correo']);
      $this->model->setTelefono($_POST['telefono']);
      $this->model->setCedula($_POST['Documento']);
      $this->model->setRol($_POST['IdRol']);

      $respuesta = $this->model->EditUser();
      if ($respuesta) {
        header('Location: /Restaurante/views/admin/usuarios/BuscarUsuario.php');
      } else {
        echo "Error al editar usuario";
      }
    }

    public function delete()
    {
      $id = $_GET['id'];
      $this->model->setId($id);
      $respuestas = $this->model->deleteUser();
      if ($respuestas) {
        header('Location: /Restaurante/views/admin/usuarios/BuscarUsuario.php');
      } else {
        echo "Error al eliminar el usuario";
      }
    }

    public function search($campo, $valor)
    {
      $usuario = new Usuario();

     

      return $registros = $usuario->searchUserF($campo, $valor);
    }

    public function cerrarSesion()
    {
        session_start();
        session_unset();
        session_destroy();
    }
  }

  ?>