<?php
require_once '../Model/Usuario.php';
require_once '../Model/Productos.php';
require_once '../Model/Cesta.php';

if (session_status() === PHP_SESSION_NONE) session_start();

if ($_SESSION['usuarioSesion']->getRol() == 'cliente') {

    // Obtener ID del cliente desde la sesión
    $id_cliente = $_SESSION['usuarioSesion']->getId();

    // Obtener la cesta desde la base de datos para el cliente específico
    $data['productosCesta'] = Cesta::getCestaId($id_cliente);  // Ahora usamos la función getCestaId
$data['totalImporte'] = 0;
    // Sincronizar la sesión con la base de datos
    $_SESSION['carrito'] = [];
    foreach ($data['productosCesta'] as $productoCesta) {
        // Obtener producto por el código
        $producto = Productos::getProductosByCodigo($productoCesta->getCod_producto());  // Usamos getProductosByCodigo en lugar de getProductosById
        if ($producto) {
            $_SESSION['carrito'][$productoCesta->getCod_producto()] = [
                'nombre' => $producto->getNombre(),
                'precio' => $producto->getPrecio(),
                'cantidad' => $productoCesta->getCantidad()
            ];
        }
    }
    // Redirigir a la vista del carrito
    include_once '../View/carrito_v.php';
} else {
    header('Location: ../index.php');
}
