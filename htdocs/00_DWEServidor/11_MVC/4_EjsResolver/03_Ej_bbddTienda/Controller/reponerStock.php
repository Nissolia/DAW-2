<?php require_once '../Model/Productos.php';
session_start();
// buscamos el producto que vamos a usar
$id = $_REQUEST['id'];
$data['producto'] = Productos::getProductosById($id);
// Carga la vista de listado
include '../View/reponerStock_v.php';
