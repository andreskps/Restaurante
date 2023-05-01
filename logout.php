<?php

@include 'C:\xampp\htdocs\Restaurante\controllers\UsuarioController.php' ;
$usuario = new UsuarioController();
$usuario->cerrarSesion();
header('location: login.php');
?>


