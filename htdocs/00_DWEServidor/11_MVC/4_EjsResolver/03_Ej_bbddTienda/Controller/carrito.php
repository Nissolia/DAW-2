<?php
session_start();
require_once '../Model/Productos.php'; // Asegúrate de incluir el modelo correcto
require_once '../Model/Cesta.php'; // Incluir el modelo Cesta

// Obtener el ID del producto de la URL
if (isset($_GET['id'])) {
    $productoId = intval($_GET['id']); // Convertir a entero para evitar inyección SQL

    // Obtener detalles del producto desde la base de datos
    $producto = Productos::getProductosById($productoId);

    if ($producto) {
        // Verificar el stock disponible
        $stockDisponible = $producto->getStock();
        $cantidadEnCarrito = isset($_SESSION['carrito'][$productoId]) ? $_SESSION['carrito'][$productoId]['cantidad'] : 0;

        if ($stockDisponible > $cantidadEnCarrito) {
            // Añadir el producto al carrito (en sesión)
            $_SESSION['carrito'][$productoId] = [
                'codigo_producto' => $producto->getId(),
                'nombre' => $producto->getNombre(),
                'precio' => $producto->getPrecio(),
                'cantidad' => $cantidadEnCarrito + 1 // Incrementar la cantidad en el carrito
            ];

            // Actualizar la base de datos (tabla `cesta`)
            $cesta = new Cesta($productoId, $cantidadEnCarrito + 1);
            $cesta->agregarCesta(); // Usamos el método agregarCesta del modelo

            // Actualizar el stock en el objeto del producto
            $nuevoStock = $stockDisponible - 1;
            $producto->vender(1); // Restar stock en la base de datos
        } else {
            // Mensaje de error si no hay suficiente stock
            $_SESSION['error'] = "No hay suficiente stock para el producto: " . $producto->getNombre();
        }
    } else {
        // Mensaje de error si el producto no existe
        $_SESSION['error'] = "El producto con ID $productoId no existe.";
    }
} else {
    // Mensaje de error si no se recibe el ID
    $_SESSION['error'] = "No se recibió un ID de producto válido.";
}

// Verificar si hay productos en el carrito
if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
    // Productos en el carrito
    $data['cesta'] = $_SESSION['carrito'];  // Aquí estamos pasando el array de productos
} else {
    // Si no hay productos, mostrar mensaje
    $data['cesta'] = [];  // Pasamos un array vacío en vez de un número
}

// Incluir el archivo de la vista del carrito
include_once '../View/carrito_v.php';

?>
