<?php
require_once '../Model/Productos.php';
require_once '../Model/Cesta.php';
require_once '../Model/Usuario.php';

if (session_status() === PHP_SESSION_NONE) session_start();
if ($_SESSION['usuarioSesion']->getRol() == 'admin') {


    // Obtiene todos los productos
    $data['productos'] = Productos::getProductos();

    // Obtiene el número de objetos en la cesta utilizando el ID del producto
    $data['cesta'] = 0;
    foreach ($data['productos'] as $producto) {
        $data['cesta'] += Cesta::contarObjetosEnCesta($producto->getCodigo());
    }

    // Carga la vista de listado
    include '../View/a_listaProductos_v.php';
} else {
    header('Location: ../index.php');
}
