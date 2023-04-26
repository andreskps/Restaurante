<?php
require("../Clases/Usuario.php");
$usuario = new Usuario();

if (isset($_POST['campo']) && isset($_POST['valor'])) {
    // Preparar la consulta SQL con los valores recibidos
    $campo = $_POST['campo'];
    $valor = $_POST['valor'];
    $registros = $usuario->searchUserF($campo, $valor);
}
if (empty($_POST['valor'])) {
    $registros = $usuario->searchUser();
}
?>
    <main class="d-flex ">

        <?php include '../includes/head.php'; ?>
        <?php include '../admin.php'; ?>

        <div class="container-fluid d-flex flex-column justify-content-center m-auto">
            <!-- Formulario para seleccionar el campo y el valor -->
            <form class="form-inline" method="POST">
                <div class="form-group">
                    <label for="campo">Buscar por:</label>
                    <select class="form-control" id="campo" name="campo">
                        <option value="id">ID</option>
                        <option value="nombre">NOMBRE</option>
                        <option value="apellido">APELLIDO</option>
                        <option value="telefono">TELEFONO</option>
                        <option value="documento">DOCUMENTO</option>
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
                        <th>CORREO</th>
                        <th>NOMBRE</th>
                        <th>APELLIDO</th>
                        <th>TELEFONO</th>
                        <th>DOCUMENTO</th>
                        <th>ROL</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($registros as $row) { ?>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['correo'] ?></td>
                            <td><?php echo $row['Nombre'] ?></td>
                            <td><?php echo $row['Apellido'] ?></td>
                            <td><?php echo $row['Telefono'] ?></td>
                            <td><?php echo $row['Documento'] ?></td>
                            <td><?php echo $row['Rol'] ?></td>
                            <td>
                                <a href="EditarUsuario.php?id=<?php echo $row['id'] ?>" class="button-primario bg-primario text-white">Editar</a>
                                <a href="EliminarUsuario.php?id=<?php echo $row['id'] ?>" class="btn btn-eliminar btn-danger">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>

</body>
</html>