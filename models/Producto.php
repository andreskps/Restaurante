<?php
require_once 'C:\xampp\htdocs\Restaurante\config\db.php';
class Productos
{
 private $Id;
 private $nombre;
 private $descripcion;
 private $precio;
 private $ruta_img;
 private $db;

 public function setId($Id)
    {
        $this->Id=$Id;
    }

    public function getId()
    {
        return $this->Id;
    }

    public function setNombre($nombre)
    {
        $this->nombre=$nombre;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion=$descripcion;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setPrecio($precio)
    {
        $this->precio=$precio;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function setRutaImg($ruta_img)
    {
        $this->ruta_img=$ruta_img;
    }

    public function getRutaImg()
    {
        return $this->ruta_img;
    }

    public function __construct()
    {
        $this->db = DataBase::connect();
    }

    public function RegistrarProducto()
    {
        $sql = "INSERT INTO productos VALUES(NULL, '{$this->getNombre()}', '{$this->getDescripcion()}', '{$this->getPrecio()}', '{$this->getRutaImg()}')";
        $save = $this->db->query($sql);
        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function searchProduct()
    {
        $sql = $this->db->query("SELECT u.Id, u.nombre, u.descripcion, u.precio, u.ruta_img FROM Productos u");
        $Productos = array();
        if ($sql && $sql->num_rows > 0) {
            while ($row = $sql->fetch_assoc()) {
                $Productos[] = $row;
            }
        }
        return $Productos;
        
    }

    public function searchProductF($campo, $valor)
    {
        $sql = $this->db->query("SELECT u.Id, u.nombre, u.descripcion, u.precio, u.ruta_img FROM Productos u WHERE u.$campo='$valor'");
        $Productos = array();
        if ($sql && $sql->num_rows > 0) {
            while ($row = $sql->fetch_assoc()) {
                $Productos[] = $row;
            }
        }
        return $Productos;
    }
    
    public function llenarForm()
    {
        $sql = $this->db->query("SELECT * FROM productos WHERE Id=$this->Id");
        $Productos = $sql->fetch_assoc();
        return $Productos;
    }

    public function EditProduct()
    {   
        $sql = "UPDATE productos SET Id='$this->Id',nombre='$this->nombre',descripcion='$this->descripcion',precio='$this->precio',ruta_img='$this->ruta_img' WHERE Id= $this->Id";
        $save = $this->db->query($sql);

        if ($save) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteProduct()
    {
        $sql = "DELETE FROM Productos WHERE Id=$this->Id";
        $delete = $this->db->query($sql);

        if ($delete) {
            return true;
        } else {
            return false;
        }
    }
}

?>