<?php
 require 'C:\xampp\htdocs\Restaurante\controllers\ProductoController.php';

    $producto = new ProductosController();
    $registros = $producto->index(); 
    //en caso de que hayan dado parametros de busqueda
    if(isset($_POST['campo']) && isset($_POST['valor'])){
        $registros = $producto->search($_POST['campo'], $_POST['valor']); 
    }

?>
    <main class="d-flex ">

        <?php include 'C:\xampp\htdocs\Restaurante\includes\head.php'; ?>
        <?php include 'C:\xampp\htdocs\Restaurante\views\admin\admin.php'; ?>

        <div class="container-fluid d-flex flex-column justify-content-center m-auto">
            <!-- Formulario para seleccionar el campo y el valor -->
            <form class="form-inline" method="POST" action="#">
                <div class="form-group">
                    <label for="campo">Buscar por:</label>
                    <select class="form-control" Id="campo" name="campo">
                        <option value="Id">ID</option>
                        <option value="nombre">NOMBRE</option>
                        <option value="descripcion">DESCRIPCION</option>
                        <option value="precio">PRECIO</option>
                        <option value="ruta_img">RUTA IMG</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="valor">Valor:</label>
                    <input type="text" class="form-control" id="valor" name="valor" placeholder="Valor">
                </div>
                <button type="submit" class="btn btn-primary">Buscar</button>
            </form>

            <!-- Tabla con los registros encontrados -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>DESCRIPCION</th>
                        <th>PRECIO</th>
                        <th>RUTA IMG</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($registros as $row) { ?>
                        <tr>
                            <td><?php echo $row['Id'] ?></td>
                            <td><?php echo $row['nombre'] ?></td>
                            <td><?php echo $row['descripcion'] ?></td>
                            <td><?php echo $row['precio'] ?></td>
                            <td><?php echo $row['ruta_img'] ?></td>
                            <td>
                                <a href="EditarProductos.php?id=<?php echo $row['Id'] ?>" class="button-primario bg-primario text-white">Editar</a>
                                <a href="EliminarProductos.php?id=<?php echo $row['Id'] ?>" class="btn btn-eliminar btn-danger">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>

</body>
</html>