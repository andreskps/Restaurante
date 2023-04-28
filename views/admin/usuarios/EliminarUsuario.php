<?php
$idUsuario = $_GET['id']; //obtenemos el id de la url
include_once('C:\xampp\htdocs\Restaurante\controllers\UsuarioController.php');
$usuarioController = new UsuarioController();
if (isset($_POST['id'])) {
    $usuarioController->delete();
}


?>
<mai class="d-flex">
    <?php
    include_once('C:\xampp\htdocs\Restaurante\views\admin\admin.php');
    ?>

    <div class="mx-auto d-flex flex-column justify-content-center">
        <form  action="#" method="post" class="mx-auto align-content-center" >
            <input type="hidden" name="id" value="<?php echo $idUsuario; ?>">
            <p class="fw-bold">¿Está seguro de eliminar este usuario?</p>
            <input type="submit" class="btn btn-danger" value="Eliminar">
            <a href="BuscarUsuario.php" class="btn btn-primary">Cancelar</a>
        </form>
    </div>
</mai>