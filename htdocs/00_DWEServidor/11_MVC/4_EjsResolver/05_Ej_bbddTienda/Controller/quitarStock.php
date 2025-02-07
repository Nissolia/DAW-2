<?php
require_once '../Model/Productos.php';

if (session_status() === PHP_SESSION_NONE) session_start();

// Verificamos si se ha recibido el ID y la cantidad
if (isset($_POST['id']) && isset($_POST['retirar'])) {
    $id = $_POST['id'];
    $cantidad = (int) $_POST['retirar']; // Cantidad a retirar

    // Obtenemos el producto desde la base de datos
    $producto = Productos::getProductosByCodigo($id);

    if ($producto) {
        // Verificamos que haya suficiente stock
        if ($producto->getStock() >= $cantidad) {
            // Llamamos a la función de vender para reducir el stock
            $producto->vender($cantidad);

            // Redirigimos a una página de éxito
            header('Location: ../Controller/a_listaProductos.php');
        } else {
            $_SESSION['error'] = 'No hay suficiente stock para retirar esa cantidad de <b>'.$producto->getNombre().'</b>';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    } else {
        $_SESSION['error'] = "Producto no encontrado.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
?>
