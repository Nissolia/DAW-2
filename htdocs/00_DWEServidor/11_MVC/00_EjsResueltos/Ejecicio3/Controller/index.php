<?php
if (session_status() == PHP_SESSION_NONE) session_start();
require_once '../Model/Producto.php';
// Obtiene todos los articulos
$data['productos'] = Producto::getProductos();
//comprueba si hay productos en la cesta almacenados en cookies
if (!isset($_SESSION['productos'])) {//creamos la cesta la primera vez que cargamos la página
    $_SESSION['productos'] = [];
    $_SESSION['total']     = 0;
    $_SESSION['cantidad']  = 0;
    if (isset($_COOKIE['cantidad'])) { //comprobamos si en la cookie hay productos guardados de una cesta anterior
        $_SESSION['productos']=unserialize($_COOKIE['productos']);
        $_SESSION['total']    = $_COOKIE['total'];
        $_SESSION['cantidad'] = $_COOKIE['cantidad'];
    } 
}
//carga la vista con el listado de productos
include '../View/index_V.php';

