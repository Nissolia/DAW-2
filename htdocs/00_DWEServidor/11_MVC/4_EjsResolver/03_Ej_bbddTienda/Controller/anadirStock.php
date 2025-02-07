<?php require_once '../Model/Productos.php';
session_start();
// buscamos el producto que vamos a usar
$id = $_REQUEST['id'];
$data['producto'] = new Productos($_GET['id']);
$data['producto']->getProductosById($id);
$numReponer = intval($_REQUEST['reponer']);
if ($numReponer > 0) {
    $data['producto']->reponer($numReponer);
}
// Carga la vista de listado
header("Location: index.php");
