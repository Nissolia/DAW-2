<?php

require_once '../Model/Productos.php';
require_once '../Model/Cesta.php';
require_once '../Model/Usuario.php';

if(session_status() === PHP_SESSION_NONE) session_start();

if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
    // Procesar la compra
    $cesta = $_SESSION['carrito'];
    Productos::procesarCompra($cesta);

    // Vaciar el carrito después de la compra
    $_SESSION['carrito'] = [];

    // Redirigir al usuario a una página de confirmación o éxito
    header('Location: ../View/compra_confirmada.php');
    exit;
} else {
    $_SESSION['error'] = "No hay productos en el carrito.";
    header('Location: ../Controller/carrito.php');
    exit;
}
