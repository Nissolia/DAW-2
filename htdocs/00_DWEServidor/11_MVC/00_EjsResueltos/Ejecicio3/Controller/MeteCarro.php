<?php
if (session_status() == PHP_SESSION_NONE) session_start();
require_once '../Model/Producto.php';
if (isset($_POST['prod'])) {
    $prod = $_POST['prod'];
    if (isset($_SESSION['productos'][$prod])) {
        $_SESSION['productos'][$prod]++;
    } else {
        $_SESSION['productos'][$prod] = 1;
    }
    $_SESSION['cantidad']++;
    $_SESSION['total'] += Producto::getProductoById($prod)->getPrecio();
    setcookie('cantidad', $_SESSION['cantidad'], time() + 24 * 3600);
    setcookie('total', $_SESSION['total'], time() + 24 * 3600);
    setcookie('productos', serialize($_SESSION['productos']), time() + 24 * 3600);
}
header('Location:index.php');
