<?php

include_once("../Clases/Usuario.php");

$usuario = new Usuario();
$idUsuario = $_GET['id'];
$usuario->setId($idUsuario);
if($usuario->deleteUser())
{
    header("Location: BuscarUsuario.php");
}else
{
    echo "Error al eliminar usuario";
}

?>