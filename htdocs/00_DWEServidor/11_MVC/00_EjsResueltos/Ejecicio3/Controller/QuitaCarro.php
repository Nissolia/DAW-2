<?php
session_start();
if (isset($_REQUEST['cod_pro'])) {
    require_once '../Model/Producto.php';
    $prod = $_REQUEST['cod_pro'];
    if ($_SESSION['productos'][$prod]==1) {
        unset($_SESSION['productos'][$prod]);
    }else{
        $_SESSION['productos'][$prod]--;
    }
    $_SESSION['cantidad']--;
    $_SESSION['total'] -= Producto::getProductoById($prod)->getPrecio();
    setcookie('cantidad', $_SESSION['cantidad'], time() + 24 * 3600);
    setcookie('total', $_SESSION['total'], time() + 24 * 3600);
    setcookie($prod, serialize($_SESSION['productos'][$prod]), time() + 24 * 3600);
}
header('Location:../Controller/Cesta.php');
