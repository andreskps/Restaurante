 <?php

require_once 'db.php';
class Usuario{

    private $nombre;
    private $apellido;
    private $email;
    private $correo;
    private $clave;
    private $cedula;
    private $telefono;
    private $rol;
    private $db;

    public function __construct(){
        $this->db = DataBase::connect();
    }

    public function Login ($correo,$clave){
      

        $select = $this->db->prepare('SELECT * FROM usuario WHERE correo = ? AND clave = ?');

        $select->bind_param('ss', $correo, $clave);
        $select->execute();
        $result = $select->get_result();
        $row = $result->fetch_assoc();

        if ($row) {
            $rol = $row['IdRol'];
            $_SESSION['IdRol'] = $rol;
            switch($_SESSION['IdRol']){
                case 1:
                    header('location: admin.php');
                break;
    
                case 2:
                    header('location: mesero.php');
                break;
                case  3:
                    header('location: cajero.php');
                break;
                
                case 4:
                    header('location: chef.php');
                break;
        
                default:
            }
        }else{
            echo "Usuario o contraseña incorrectos";
        }
    }

    public function cerrarSesion(){
        session_start();
        session_unset();
        session_destroy();
    }

    public function SelectRoles(){
        $select = $this->db->query("SELECT * FROM rol");
        $roles = array();
        while($row = $select->fetch_assoc()){
            $roles[] = $row;
        }
        return $roles;
    }

    public function RegistrarUser($correo,$clave,$nombre,$apellido,$telefono,$documento,$rol)
    {
        $sql = "INSERT INTO usuario VALUES(NULL, '{$correo}', '{$clave}', '{$nombre}','{$apellido}', '{$telefono}', '{$documento}', '{$rol}')";
        $save = $this->db->query($sql);

        if ($save) {
            return true;
        }else{
            return false;
        }
    }
}



?>