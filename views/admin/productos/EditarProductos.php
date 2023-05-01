<?php
require_once 'C:\xampp\htdocs\Restaurante\models\Producto.php';
require_once 'C:\xampp\htdocs\Restaurante\controllers\ProductoController.php';
$IdProductos = $_GET['id'];
$Productos = new Productos();
$campos = array();
$Productos->setId($IdProductos);
$campos = $Productos->llenarForm(); //se encarga de llenar los campos del formulario con los datos del producto

if (isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_POST['precio']) && isset($_FILES['ruta_img'])) {
    $ProductosController = new ProductosController();
    $ProductosController->edit();
}
?>

<!DOCTYPE html>
<html lang="es">

<body>
    <main class="d-flex">
        <?php
        include_once('C:\xampp\htdocs\Restaurante\views\admin\admin.php');
        ?>
        <div class="m-auto ">

            <h1 class="fw-bold text-primario font-monospace text-center">Editar Producto</h1>

            <form action="#" method="post" enctype="multipart/form-data">

                <div class="d-flex gap-4">
                    <div class="form-outline mb-4">
                        <label class="form-label fw-bold text-primario font-monospace" for="nombre">Nombre</label>
                        <input class="form-control form-control-lg" type="text" name="nombre" id="nombre" value="<?php echo $campos['nombre']; ?>">
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label fw-bold text-primario font-monospace" for="descripcion">Descripcion</label>
                        <input class="form-control form-control-lg" type="text" name="descripcion" id="descripcion" value="<?php echo $campos['descripcion']; ?>">
                    </div>
                </div>


                <div class="d-flex gap-4">
                    <div class="form-outline mb-4">
                        <label class="form-label fw-bold text-primario font-monospace" for="precio">Precio</label>
                        <input class="form-control form-control-lg" type="text" name="precio" id="precio" value="<?php echo $campos['precio']; ?>">
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label fw-bold text-primario font-monospace" for="ruta_img">Ruta Img</label>
                        <input class="form-control form-control-lg" type="file" name="ruta_img" id="ruta_img"
                         value="<?php echo "/Restaurante/assets/img/productos/{$campos['ruta_img']}"; ?> ">
                    </div>
                </div>

                <div class="d-flex gap-4 mx-auto">
                    <img src="<?php echo "/Restaurante/assets/img/productos/{$campos['ruta_img']}"; ?>" alt="producto" class="img-fluid m-auto" width="200px" height="200px">

                </div>
                <div class="d-flex justify-content-center">
                    <input type="submit" class="button-primario bg-primario text-white my-5" value="Editar Producto">
                </div>
            </form>
        </div>
    </main>
</body>

</html>