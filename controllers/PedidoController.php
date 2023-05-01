<?php
require_once 'C:\xampp\htdocs\Restaurante\models\PedidoModel.php'; 
class PedidoController{
    private $model;

    public function __construct()
    {
      $this->model = new Cocina();
    }

    public function cancel()
    {
      $id = $_GET['id'];
      $this->model->setId($id);
      $respuestas = $this->model->cancelOrder();
      if ($respuestas) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
      } else {
        echo "Error al cancelar el pedido";
      }
    }

    public function calculate()
    {
      $id = $_GET['id'];
      $this->model->setId($id);
      $respuestas = $this->model->calculatePrice();
      if ($respuestas) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
      } else {
        echo "Error al calcular el precio del pedido";
      }
    }
}
?>