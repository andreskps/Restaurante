<?php
$idProductos = $_GET['id']; //obtenemos el id de la url
include_once('C:\xampp\htdocs\Restaurante\controllers\ProductoController.php');
$ProductosController = new ProductosController();
if (isset($_POST['Id'])) {
    $ProductosController->delete();
}


?>
<mai class="d-flex">
    <?php
    include_once('C:\xampp\htdocs\Restaurante\views\admin\admin.php');
    ?>

    <div class="mx-auto d-flex flex-column justify-content-center">
        <form  action="#" method="post" class="mx-auto align-content-center" >
            <input type="hidden" name="Id" value="<?php echo $idProductos; ?>">
            <p class="fw-bold">¿Está seguro de eliminar este producto?</p>
            <input type="submit" class="btn btn-danger" value="Eliminar">
            <a href="BuscarProductos.php" class="btn btn-primary">Cancelar</a>
        </form>
    </div>
</mai>