<?php
require_once '../Model/Productos.php';
require_once '../Model/Cesta.php';
require_once '../Model/Usuario.php';

if (session_status() === PHP_SESSION_NONE) session_start();
// si el usuario es cliente puede entrar en esta pagina
if ($_SESSION['usuarioSesion']->getRol() == 'cliente') {

    if (isset($_REQUEST['id']) && !empty($_REQUEST['id'])) {
        $productoId = ($_REQUEST['id']);
        $cantidad = 1; // Cantidad por defecto (puedes cambiarlo si es necesario)

        // Obtener detalles del producto desde la base de datos
        $producto = Productos::getProductosByCodigo($productoId);

        if ($producto) {
            // Verificar stock disponible
            if ($producto->getStock() < $cantidad) {
                $_SESSION['error'] = "No hay suficiente stock para este producto.";
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit;
            }

            // Añadir a la sesión (carrito en memoria)
            if (isset($_SESSION['carrito'][$productoId])) {
                $_SESSION['carrito'][$productoId]['cantidad']++;
            } else {
                $_SESSION['carrito'][$productoId] = [
                    'nombre' => $producto->getNombre(),
                    'precio' => $producto->getPrecio(),
                    'cantidad' => 1
                ];
            }

            // Persistir en la base de datos
            $cesta = new Cesta($_SESSION['usuarioSesion']->getId(), $productoId, $cantidad);
            $cesta->agregarCesta();

            // Actualizar el stock del producto
            $nuevoStock = $producto->getStock() - $cantidad;
            Productos::actualizarStock($productoId, $nuevoStock);

            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        } else {
            // Si el producto no se encuentra, redirigir con un mensaje de error
            $_SESSION['error'] = "El producto no existe.";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
    } else {
        // Si no se recibe un ID de producto, redirigir con un mensaje de error
        $_SESSION['error'] = "No se recibió un ID de producto válido.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
}else{
    header('Location: ../index.php');
}
