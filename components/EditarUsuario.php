<?php
include_once("../Clases/Usuario.php");
$idUsuario = $_GET['id'];
$usuario = new Usuario();
$campos = array();


$usuario->setId($idUsuario);

$campos = $usuario->llenarForm();

if (isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['correo']) && isset($_POST['telefono']) && isset($_POST['Documento']) && isset($_POST['IdRol'])) {
    $usuario->setNombre($_POST['nombre']);
    $usuario->setApellido($_POST['apellido']);
    $usuario->setCorreo($_POST['correo']);
    $usuario->setTelefono($_POST['telefono']);
    $usuario->setCedula($_POST['Documento']);
    $usuario->setRol($_POST['IdRol']);

    $usuario = $usuario->EditUser();

    if ($usuario) {
        header('Location: BuscarUsuario.php');
    } else {
        echo "Error al editar usuario";
    }
}

?>

<!DOCTYPE html>
<html lang="es">



<body>


    <main class="d-flex">
        <?php
        include_once("../admin.php");
        ?>
        <div class="m-auto ">

            <h1 class="fw-bold text-primario font-monospace text-center">Editar Usuario</h1>

            <form action="#" method="post">

                <div class="d-flex gap-4">
                    <div class="form-outline mb-4">
                        <label class="form-label fw-bold text-primario font-monospace" for="nombre">Nombre</label>
                        <input class="form-control form-control-lg" type="text" name="nombre" id="nombre" value="<?php echo $campos['Nombre']; ?>">
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label fw-bold text-primario font-monospace" for="apellido">Apellido</label>
                        <input class="form-control form-control-lg" type="text" name="apellido" id="apellido" value="<?php echo $campos['Apellido']; ?>">
                    </div>
                </div>


                <div class="d-flex gap-4">
                    <div class="form-outline mb-4">
                        <label class="form-label fw-bold text-primario font-monospace" for="Documento">Documento</label>
                        <input class="form-control form-control-lg" type="text" name="Documento" id="Documento" value="<?php echo $campos['Documento']; ?>">
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label fw-bold text-primario font-monospace" for="telefono">Telefono</label>
                        <input class="form-control form-control-lg" type="text" name="telefono" id="telefono" value="<?php echo $campos['Telefono']; ?>">
                    </div>
                </div>

                <div class="d-flex gap-4">
                    <div class="form-outline mb-4">
                        <label class="form-label fw-bold text-primario font-monospace" for="correo">Correo</label>
                        <input class="form-control form-control-lg" type="email" name="correo" id="correo" value="<?php echo $campos['correo']; ?>">
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label fw-bold text-primario font-monospace" for="IdRol">Rol</label>
                        <?php
                        include_once("../Clases/Usuario.php");
                        $usuario = new Usuario();


                        echo "<select name='IdRol'  class='form-control form-control-lg' value='" . $campos['IdRol'] . "'
                         > ";
                        foreach ($usuario->SelectRoles() as $rol) {
                            if ($rol['id'] == $campos['IdRol']) {
                                echo "<option value='" . $rol['id'] . "' selected>" . $rol['Nombre'] . "</option>";
                            } else {
                                echo "<option value='" . $rol['id'] . "'>" . $rol['Nombre'] . "</option>";
                            }
                        }
                        ?>
                    </div>
                </div>


                <div class="d-flex justify-content-center">
                  <input type="submit" class="button-primario bg-primario text-white my-5" value="Editar Usuario">
                </div>
              


            </form>


        </div>

    </main>




</body>

</html>