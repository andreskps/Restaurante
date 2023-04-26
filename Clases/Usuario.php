 <?php

    require_once 'db.php';
    class Usuario
    {

        private $id;
        private $nombre;
        private $apellido;
        private $correo;
        private $clave;
        private $cedula;
        private $telefono;
        private $rol;
        private $db;
        private $error;

        public function setId($id)
        {
            $this->id=$id;
        }

        public function getId()
        {
            return $this->id;
        }
        public function setNombre($nombre)
        {
            $this->nombre=$nombre;
        }

        public function getNombre()
        {
            return $this->nombre;
        }

        public function setApellido($apellido)
        {
            $this->apellido=$apellido;
        }

        public function getApellido()
        {
            return $this->apellido;
        }

        public function setCorreo($correo)
        {
            $this->correo=$correo;
        }

        public function getCorreo()
        {
            return $this->correo;
        }

        public function setClave($clave)
        {
            $this->clave=$clave;
        }

        public function getClave()
        {
            return $this->clave;
        }

        public function setCedula($cedula)
        {
            $this->cedula=$cedula;
        }

        public function getCedula()
        {
            return $this->cedula;
        }

        
        public function setTelefono($telefono)
        {
            $this->telefono=$telefono;
        }

        public function getTelefono()
        {
            return $this->telefono;
        }

        public function setRol($rol)
        {
            $this->rol=$rol;
        }

        public function getRol()
        {
            return $this->rol;
        }

        public function setDb($db)
        {
            $this->db=$db;
        }

        public function getDb()
        {
            return $this->db;
        }

        public function setError($error)
        {
            $this->error=$error;
        }

        public function getError()
        {
            return $this->error;
        }

        
        public function __construct()
        {
            $this->db = DataBase::connect();
        }

        public function Login()
        {
            $select = $this->db->prepare('SELECT * FROM usuario WHERE correo = ? AND clave = ?');

            $select->bind_param('ss', $this->correo, $this->clave);
            $select->execute();
            $result = $select->get_result();
            $row = $result->fetch_assoc();

            if ($row) {
                $rol = $row['IdRol'];
                $_SESSION['IdRol'] = $rol;
                switch ($_SESSION['IdRol']) {
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
            } else {
                $this->error = "Usuario o contraseña incorrectos";
            }
        }

        public function cerrarSesion()
        {
            session_start();
            session_unset();
            session_destroy();
        }

        public function SelectRoles()
        {
            $select = $this->db->query("SELECT * FROM rol");
            $roles = array();
            while ($row = $select->fetch_assoc()) {
                $roles[] = $row;
            }
            return $roles;
        }

        public function RegistrarUser()
        {
           
            $sql = "INSERT INTO usuario VALUES(NULL, '{$this->correo}', '{$this->clave}', '{$this->nombre}','{$this->apellido}', '{$this->telefono}', '{$this->cedula}', '{$this->rol}')";
            $save = $this->db->query($sql);

            if ($save) {
                return true;
            } else {
                return false;
            }
        }

        public function searchUser()
        {
            $sql = $this->db->query("SELECT u.id, u.Nombre, u.Apellido,u.correo,u.Telefono,u.Documento,r.Nombre as 'Rol'
            FROM usuario u INNER JOIN rol r ON u.IdRol= r.id");
            $usuarios = array();
            while ($row = $sql->fetch_assoc()) {
                $usuarios[] = $row;
            }
            return $usuarios;
        }

        public function searchUserF($campo, $valor)
        {
            $sql = $this->db->query("SELECT u.id, u.Nombre, u.Apellido,u.correo,u.Telefono,u.Documento,r.Nombre as 'Rol' 
            FROM usuario u INNER JOIN rol r ON u.IdRol= r.id WHERE u.$campo='$valor'");
            $usuarios = array();
            while ($row = $sql->fetch_assoc()) {
                $usuarios[] = $row;
            }
            return $usuarios;
        }

        public function llenarForm()
        {
            $sql = $this->db->query("SELECT * FROM usuario WHERE id=$this->id");
            $usuario = $sql->fetch_assoc();
            return $usuario;
        }

        public function EditUser()
        {
            //$sql = "UPDATE usuario SET Nombre='$nombre', Apellido='$apellido', Telefono='$telefono', Documento='$documento', correo='$correo', IdRol='$rol' WHERE id=$id";
            $sql = "UPDATE usuario SET Nombre='$this->nombre', Apellido='$this->apellido', Telefono='$this->telefono', Documento='$this->cedula', correo='$this->correo', IdRol='$this->rol' WHERE id=$this->id";
            $save = $this->db->query($sql);

            if ($save) {
                return true;
            } else {
                return false;
            }
        }

        public function deleteUser()
        {
            $sql = "DELETE FROM usuario WHERE id=$this->id";
            $delete = $this->db->query($sql);

            if ($delete) {
                return true;
            } else {
                return false;
            }
        }
        
    }

    ?>