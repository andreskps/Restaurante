<?php
$idPedido = $_GET['id']; //obtenemos el id de la url
include_once('C:\xampp\htdocs\Restaurante\controllers\PedidoController.php');
$PedidoController = new PedidoController();

 $PedidoController->cancel();

?>