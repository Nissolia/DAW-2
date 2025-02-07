<?php
require_once '../Model/Productos.php';

if (isset($_POST['id'])) {
    // Crear objeto Producto con el ID recibido
    $producto = new Productos($_POST['id']);
    
    // Eliminar el producto de la base de datos
    $producto->delete();
}

// Redirigir de vuelta a la página principal
header('Location: ../index.php');
exit();
?>
