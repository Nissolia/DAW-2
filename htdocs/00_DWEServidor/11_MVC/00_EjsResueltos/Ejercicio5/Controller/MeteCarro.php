<?php
if (session_status() == PHP_SESSION_NONE) session_start();
require_once '../Model/Producto.php';
require_once '../Model/Cesta.php';
if (isset($_REQUEST['prod'])) {
    $prod = $_REQUEST['prod'];
    if ($cesta=Cesta::getCestaById($_SESSION['id_usuario'],$prod)){
        $cesta->añadir();
    }else {
        $cesta= new Cesta($_SESSION['id_usuario'],$prod);
        $cesta->insert();
    }
}
header('Location:index.php');
