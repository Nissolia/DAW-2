<?php
session_start();
// Añadir productos al carrito
if (isset($_POST['codigo']) && isset($_POST['cantidad'])) {
    $codigo = $_POST['codigo'];
    $cantidad = $_POST['cantidad'];

    if (isset($_SESSION['carrito'][$codigo])) {
        $_SESSION['carrito'][$codigo] += $cantidad;
    } else {
        $producto = $_SESSION['catalogo'][$codigo];
        $_SESSION['carrito'][$codigo] = [
            'nombre' => $producto['nombre'],
            'precio' => $producto['precio'],
            'imagen' => $producto['imagen'],
            'cantidad' => $cantidad
        ];
        setcookie("carrito", serialize($_SESSION['carrito'][$codigo]), strtotime("+1 day"));
    }
}
// header('Location:paginaPrincipal.php');
// nos devuelve a la pagina anterior
header('Location:'.getenv('HTTP_REFERER'));
?>