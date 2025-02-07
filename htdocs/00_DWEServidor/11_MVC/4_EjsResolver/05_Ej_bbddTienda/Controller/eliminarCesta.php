<?php
require_once '../Model/Usuario.php';
require_once '../Model/Productos.php';
require_once '../Model/Cesta.php';

if(session_status() === PHP_SESSION_NONE) session_start();

if ($_SESSION['usuarioSesion']->getRol() == 'cliente') {

    if (isset($_REQUEST['id'])) {
        $cod_producto = ($_REQUEST['id']); // Convertir el ID del producto a entero para evitar errores

        // Verificar si el producto existe en el carrito de la sesión
        if (isset($_SESSION['carrito'][$cod_producto])) {
            // Reducir la cantidad en 1
            $_SESSION['carrito'][$cod_producto]['cantidad']--;

            // Si la cantidad llega a 0, eliminar el producto del carrito
            if ($_SESSION['carrito'][$cod_producto]['cantidad'] <= 0) {
                unset($_SESSION['carrito'][$cod_producto]); // Eliminar producto de la sesión
            }

            // Eliminar la cantidad de la base de datos también (opcional)
            $cesta = new Cesta($_SESSION['usuarioSesion']->getId(), $cod_producto, 1);
            $cesta->borrarProductoCesta($_SESSION['usuarioSesion']->getId(),$cod_producto);
        }

        // Redirigir después de borrar/reducir
        header("Location: index.php");
        exit;
    } else {
        // Si no se recibe un ID válido, redirigir con un mensaje de error
        $_SESSION['error'] = "No se recibió un ID de producto válido.";
        header("Location: index.php");
        exit;
    }
} else {
    header('Location: ../index.php');
}
// update a la base de datos de la cesta