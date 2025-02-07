<?php 
require_once '../Model/Productos.php';
require_once '../Model/Cesta.php';
require_once '../Model/Usuario.php';

if (session_status() === PHP_SESSION_NONE) session_start();
// buscamos el producto que vamos a usar
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $data['producto'] = Productos::getProductosByCodigo($id);
}else{
    header('Location: ../Controller/a_listaProductos.php');
}

// Carga la vista de listado
include '../View/reponerStock_v.php';
