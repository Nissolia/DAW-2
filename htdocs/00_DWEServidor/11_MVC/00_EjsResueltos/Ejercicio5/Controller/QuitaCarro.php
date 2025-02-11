<?php
if (session_status() == PHP_SESSION_NONE) session_start();
if (isset($_REQUEST['prod'])) {
    require_once '../Model/Producto.php';
    require_once '../Model/Cesta.php';
    $cesta = Cesta::getCestaById($_SESSION['id_usuario'],$_REQUEST['prod']);
    if ($cesta->getCantidad()==1) {
        $cesta->delete();
    }else{
        $cesta->añadir(-1);
    }
}
header('Location:../Controller/VerCesta.php');
