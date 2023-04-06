<?php
require("Clases/Usuario.php");

$usuario = new Usuario();

if (isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['Documento']) && isset($_POST['telefono']) && isset($_POST['correo']) && isset($_POST['clave']) && isset($_POST['IdRol'])) {

    $respuestas = $usuario->RegistrarUser($_POST['correo'], $_POST['clave'], $_POST['nombre'], $_POST['apellido'], $_POST['telefono'], $_POST['Documento'], $_POST['IdRol']);

    if ($respuestas) {
        echo "Usuario registrado";
    } else {
        echo "Error al registrar usuario";
    }
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <form action="#" method="post">
        <label for="correo">Nombre</label>
        <input type="text" name="nombre" id="nombre">

        <label for="correo">Apellido</label>
        <input type="text" name="apellido" id="apellido">

        <label for="correo">Documento</label>
        <input type="text" name="Documento" id="Documento">

        <label for="telefono">Telefono</label>
        <input type="text" name="telefono" id="telefono">


        <label for="correo">Correo</label>
        <input type="email" name="correo" id="correo">

        <label for="clave">Password</label>
        <input type="password" name="clave" id="clave">

        <label for="IdRol">Rol</label>
        <?php
        include_once("Clases/Usuario.php");
        $usuario = new Usuario();

        echo "<select name='IdRol'>";
        foreach ($usuario->SelectRoles() as $rol) {
            echo "<option value='" . $rol['id'] . "'>" . $rol['Nombre'] . "</option>";
        }
        echo "</select>";
        ?>


        <input type="submit" value="Iniciar Sesion">
    </form>
</body>

</html>