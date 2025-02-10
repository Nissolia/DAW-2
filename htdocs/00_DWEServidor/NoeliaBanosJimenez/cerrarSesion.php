<?php
if (session_status() === PHP_SESSION_NONE) session_start();
// comprobamos si se nos llega desde el boton de vaciar si no es asi nos redirige a la pagina principal
if (isset($_REQUEST['cerrarSesion'])) {
    unset($_SESSION['error']);
    unset($_SESSION['usuarioActivo']);
    unset($_SESSION['usuarios']);

    setcookie('usuario', "", -1);
   
   $_SESSION['usuarios'] = [];
}
header('Location:login.php');
