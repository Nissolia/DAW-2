<?php
session_start();
// comprobamos si se nos llega desde el boton de vaciar si no es asi nos redirige a la pagina principal
if (isset($_REQUEST['vaciar'])) {
    unset($_SESSION['carrito']);
    unset($_SESSION['cantidad']);
    unset($_SESSION['total']);
    setcookie('cantidad', "", -1);
    setcookie('total', "", -1);
    setcookie('cesta', "", -1);
    $_SESSION['carrito'] = [];
}
header('Location:paginaPrincipal.php');
?>