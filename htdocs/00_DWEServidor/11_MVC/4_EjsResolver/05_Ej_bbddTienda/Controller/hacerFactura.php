<?php
require_once '../Model/Productos.php';
require_once '../Model/Cesta.php';
require_once '../Model/Usuario.php';

if (session_status() === PHP_SESSION_NONE) session_start();

if (isset($_REQUEST['idUser'])) {
    // Obtener el ID del cliente desde la sesión o la solicitud
    $id_cliente = ($_REQUEST['idUser']);

    // Procesar la compra y generar la factura
    $archivoFactura = Cesta::procesarCompra($id_cliente);

    if ($archivoFactura) {
        // Redirigir automáticamente al archivo de la factura
        header("Location: $archivoFactura");
        exit;
    } else {
        // En caso de error, redirigir con un mensaje
        $_SESSION['error'] = "Error al procesar la compra. Intente de nuevo.";
        header("Location: ../View/index.php"); // Cambia a tu vista de error
        exit;
    }
}

// Si no se recibe el parámetro idUser
$_SESSION['error'] = "No se recibió un ID de usuario válido.";
header("Location: ../View/index.php"); // Cambia a tu vista de error
exit;
