<?php

@include "Clases/Usuario.php" ;
$usuario = new Usuario();
$usuario->cerrarSesion();
header('location: login.php');
?>


