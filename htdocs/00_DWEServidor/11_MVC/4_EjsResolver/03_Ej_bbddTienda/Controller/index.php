<?php 
require_once '../Model/Productos.php';
require_once '../Model/Cesta.php';

session_start();

// Obtiene todos los productos
$data['productos'] = Productos::getProductos();

// Obtiene el número de objetos en la cesta utilizando el ID del producto
$data['cesta'] = 0;
foreach ($data['productos'] as $producto) {
    $data['cesta'] += Cesta::contarObjetosEnCesta($producto->getId());
}

// Carga la vista de listado
include '../View/index_v.php';
