<?php 
require_once 'C:\xampp\htdocs\Restaurante\config\db.php';
class Cocina{
    private $db;
    private $error;
    private $id;
    private $fecha;
    private $estado;
    private $mesa;
    private $idMesero;
    private $total;

    public function setTotal($total)
    {
        $this->total=$total;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function setIdMesero($idMesero)
    {
        $this->idMesero=$idMesero;
    }

    public function getIdMesero()
    {
        return $this->idMesero;
    }

    public function setMesa($mesa)
    {
        $this->mesa=$mesa;
    }

    public function getMesa()
    {
        return $this->mesa;
    }
    
    public function setEstado($estado)
    {
        $this->estado=$estado;
    }

    public function getEstado()
    {
        return $this->estado;
    }
    
    public function setFecha($fecha)
    {
        $this->fecha=$fecha;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function setId($id)
    {
        $this->id=$id;
    }

    public function getId()
    {
        return $this->id;
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

    public function ChangeStatus($estado, $orden)
    {
        $sql = "UPDATE pedidos SET estado='" . $estado . "' WHERE id=" . $orden;
        $save = $this->db->query($sql);

        if ($save) {
            return true;
            //echo "Estado actualizado correctamente";
        } else {
            return false;
            //echo "Error al actualizar el estado: " . $conn->error;
        }
    }

    public function cancelOrder()
    {
        $sql = "UPDATE pedidos SET estado='CANCELADO' WHERE id=" . $this->id;
        $cancel = $this->db->query($sql);

        if ($cancel) {
            return true;
        } else {
            return false;
        }
    }

    public function calculatePrice(){
        $sql = "UPDATE pedidos SET total=calcularTotalPedido(id)";
        $cancel = $this->db->query($sql);

        if ($cancel) {
            return true;
        } else {
            return false;
        }
    }

}
?>