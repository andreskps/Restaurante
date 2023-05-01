<?php

require_once 'C:\xampp\htdocs\Restaurante\models\Producto.php';
class ProductosController
{
  private $model;

  public function __construct()
  {
    $this->model = new Productos();
  }

  public function index() //noa trae todos los productos
  {
    $registros = $this->model->searchProduct();
    return $registros;
  }

  public function create()
  {
    $nombreArchivo = $_FILES['ruta_img']['name'];
    $ruta = $_FILES['ruta_img']['tmp_name'];
    $destino = 'C:\xampp\htdocs\Restaurante\assets\img\productos/' . $nombreArchivo;

    //move_uploaded_file — Mueve un archivo subido a una nueva ubicación 
    if (move_uploaded_file($ruta, $destino)) { //si se sube la imagen llamamos el modelo
      $this->model->setRutaImg($nombreArchivo); //llamamos el metodo setRutaImg del modelo y le pasamos el nombre de la imagen
    } else {
      echo "Error al subir la imagen";
    }
    $this->model->setNombre($_POST['nombre']);
    $this->model->setDescripcion($_POST['descripcion']);
    $this->model->setPrecio($_POST['precio']);

    if ($this->model->RegistrarProducto()) {
      header('Location: /Restaurante/views/admin/Productos/BuscarProductos.php');
    }
  }
  public function edit()
  {
    $this->model->setId($_GET['id']);

    $nombreArchivo = $_FILES['ruta_img']['name'];
    $ruta = $_FILES['ruta_img']['tmp_name'];
    $destino = 'C:\xampp\htdocs\Restaurante\assets\img\productos/' . $nombreArchivo;

    //move_uploaded_file — Mueve un archivo subido a una nueva ubicación
    if (move_uploaded_file($ruta, $destino)) { //si se sube la imagen llamamos el modelo
      $this->model->setRutaImg($nombreArchivo); //llamamos el metodo setRutaImg del modelo y le pasamos el nombre de la imagen
    } else {
      echo "Error al subir la imagen";
    }

    $this->model->setNombre($_POST['nombre']);
    $this->model->setDescripcion($_POST['descripcion']);
    $this->model->setPrecio($_POST['precio']);
    $respuesta = $this->model->EditProduct();
    if ($respuesta) {
      header('Location: /Restaurante/views/admin/Productos/BuscarProductos.php');
    } else {
      echo "Error al editar el producto";
    }
  }

  public function delete()
  {
    $Id = $_GET['id'];
    $this->model->setId($Id);
    $respuestas = $this->model->deleteProduct();
    if ($respuestas) {
      header('Location: /Restaurante/views/admin/Productos/BuscarProductos.php');
    } else {
      echo "Error al eliminar el Producto";
    }
  }

  public function search($campo, $valor)
  {
    $Productos = new Productos();

    // Preparar la consulta SQL con los valores recibidos

    return $registros = $Productos->searchProductF($campo, $valor);
  }
}
