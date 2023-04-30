<?php
require_once('C:\xampp\htdocs\Restaurante\controllers\ProductoController.php');
if (isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_POST['precio']) && isset($_FILES['ruta_img'])) {

    $producto = new ProductosController();
    $producto->create();
}
?>



<main class="d-flex">

    <?php
    include("../admin.php");
    ?>

    <div class="m-auto">
        <?php
        if (isset($respuestas)) {
            echo " <div class='alert alert-success text-center'> Productos Registrado</div> ";
        } else if (isset($respuestas) && $respuestas == false) {
            echo " <div class='alert alert-danger text-center'> Producto No Registrado</div> ";
        }
        ?>
        <h1 class="fw-bold text-primario font-monospace text-center">Crear Usuario</h1>
        <form action="" method="post" class="m-auto" enctype="multipart/form-data">

            <div class="d-flex gap-4">
                <div class="form-outline mb-4">
                    <label class="form-label fw-bold text-primario font-monospace" for="nombre">Nombre</label>
                    <input class="form-control form-control-lg" type="text" name="nombre" id="nombre">
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label fw-bold text-primario font-monospace" for="descripcion">Descripcion</label>
                    <input class="form-control form-control-lg" type="text" name="descripcion" id="descripcion">
                </div>
            </div>


            <div class="d-flex gap-4">
                <div class="form-outline mb-4">
                    <label class="form-label fw-bold text-primario font-monospace" for="precio">Precio</label>
                    <input class="form-control form-control-lg" type="text" name="precio" id="precio">
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label fw-bold text-primario font-monospace" for="ruta_img">Imagen</label>
                    <input class="form-control form-control-lg" type="file" name="ruta_img" id="ruta_img">
                </div>
            </div>


            <input type="submit" class="button-primario bg-primario text-white" value="Registrar Productos">
        </form>
    </div>

</main>