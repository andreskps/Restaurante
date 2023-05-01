<!DOCTYPE html>
<html lang="en">


<?php include 'C:\xampp\htdocs\Restaurante\includes\head.php'; ?>

<body>
   <?php include 'C:\xampp\htdocs\Restaurante\includes\sidebar.php'; ?>
   <?php
   session_start();
   if (isset($_SESSION['ultimo_acceso']) && (time() - $_SESSION['ultimo_acceso'] > 300)) { //60 es un minuto para probar, para los 5 minutos se debe poner 300
      // Si han pasado más de 5 minutos desde el último acceso, redirecciona a la página de inicio de sesión y cierra la sesión
      session_unset();
      session_destroy();
      header("Location: /Restaurante/login.php");
   } else {
      // Si no ha pasado más de 5 minutos, actualiza la hora del último acceso en la variable de sesión
      $_SESSION['ultimo_acceso'] = time();
   }
   ?>
   <script src="/Restaurante/assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>