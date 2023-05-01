<?php
 require 'C:\xampp\htdocs\Restaurante\models\PedidoModel.php';
	// Recuperar los datos del formulario
	$orden = $_POST["id"];
	$estado = $_POST["estado"];

    $cocina = new Cocina();
    $estado = $cocina->ChangeStatus($estado, $orden);
    if($estado){
        echo "Estado actualizado correctamente";
        header("Location: " . $_SERVER["HTTP_REFERER"]);//regresar a la página
    }else{
        echo "Error al actualizar el estado: ";
    }
?>