<?php
require_once '../Model/Productos.php';
require_once '../Model/Cesta.php';
require_once '../Model/Usuario.php';

if (session_status() === PHP_SESSION_NONE) session_start();
if ($_SESSION['usuarioSesion']->getRol() == 'cliente') {


    // Obtener el ID del cliente desde la sesión usando el método correcto
    $id_cliente = $_SESSION['usuarioSesion']->getId();

    $data['productosCesta'] = Cesta::getCestaId($id_cliente);
    // Obtener todos los productos
    $data['productos'] = Productos::getProductos();

    // sincronizamos la sesion la bbdd
    $_SESSION['carrito'] = [];
    // Obtener el número de objetos en la cesta utilizando el ID del cliente
    $data['cesta'] = 0;

    $data['cesta'] = Cesta::contarObjetosEnCesta($id_cliente);
    // foreach ($data['productosCesta'] as $productosCesta) {
    //     $data['cesta'] += $productosCesta->getCantidad();
    // }
    // Carga la vista de listado
    include '../View/c_listaProductos_v.php';
} else {
    header('Location: ../index.php');
}
