<?php
include_once 'Clases/db.php';
include_once 'Clases/Usuario.php';

session_start();

if(isset($_SESSION['IdRol'])){
    switch($_SESSION['IdRol']){
        case 1:
            header('location: admin.php');
        break;

        case 2:
            header('location: mesero.php');
        break;
        case  3:
            header('location: cajero.php');
        break;

        case 4:
            header('location: chef.php');
        break;

        default:
    }
}

if (isset($_POST['correo']) && isset($_POST['clave'])) {
    $correo = $_POST['correo'];
    $clave = $_POST['clave'];
    $usuario = new Usuario();
    $usuario->Login($correo, $clave);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="assets/css/bootstrap.min.css">
   <link rel="stylesheet" href="assets/estilos.css">

   <title>Document</title>
</head>
<body>

<section class="vh-100 bg-terciario">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="assets/img/Logo (2).png" class="img-fluid p-5" alt="Logo">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form action="#" method="post">
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                         <label class="form-label fw-bold text-primario font-monospace" for="correo">Correo Electronico</label>
                        <input type="email" id="correo"  name="correo" class="form-control form-control-lg" />
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <label class="form-label fw-bold text-primario font-monospace" for="clave">Contraseña</label>
                        <input type="password" id="clave" name="clave" class="form-control form-control-lg"/>
                    </div>

                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" class="button-primario btn-lg bg-primario text-white" style="padding-left: 2.5rem; padding-right: 2.5rem;">Iniciar Sesión</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primario">
        <!-- Copyright -->
        <div class="text-white text-center mb-3 mb-md-0">
            Copyright © 2023. All rights reserved.
        </div>
        <!-- Copyright -->
    </div> 
</section>

<script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>
