<?php
session_start();
require_once '../Model/Productos.php'; // Asegúrate de que el modelo correcto está incluido

if (isset($_GET['id'])) {
    $productoId = intval($_GET['id']); // Asegúrate de que el ID sea un número válido

    // Obtener detalles del producto desde la base de datos
    $producto = Productos::getProductosById($productoId);

    if ($producto) {
        // Verificar si el producto ya está en el carrito
        if (isset($_SESSION['carrito'][$productoId])) {
            // Si el producto ya está en el carrito, aumentar la cantidad
            $_SESSION['carrito'][$productoId]['cantidad']++;
        } else {
            // Si el producto no está en el carrito, añadirlo
            $_SESSION['carrito'][$productoId] = [
                'nombre' => $producto->getNombre(),
                'precio' => $producto->getPrecio(),
                'cantidad' => 1
            ];
        }

        // Redirigir a la página del carrito
        header('Location: ../Controller/carrito.php');
        exit;
    } else {
        // Si el producto no se encuentra, redirigir con un mensaje de error
        $_SESSION['error'] = "El producto no existe.";
        header('Location: ../Controller/carrito.php');
        exit;
    }
} else {
    // Si no se recibe un ID de producto, redirigir con un mensaje de error
    $_SESSION['error'] = "No se recibió un ID de producto válido.";
    header('Location: ../Controller/carrito.php');
    exit;
}
