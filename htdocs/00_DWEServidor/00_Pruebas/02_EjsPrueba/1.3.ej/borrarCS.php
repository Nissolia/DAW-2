<?php
session_start();
// comprobamos si se nos llega desde el boton de vaciar si no es asi nos redirige a la pagina principal
if (isset($_REQUEST['vaciar'])) {
    unset($_SESSION['usuario']);
    unset($_SESSION['error']);
    setcookie('usuario', "", -1);
    $_SESSION['error'] = "";
}
header('Location:login.php');
?>