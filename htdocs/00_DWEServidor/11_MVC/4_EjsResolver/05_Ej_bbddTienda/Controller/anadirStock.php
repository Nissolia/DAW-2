<?php require_once '../Model/Productos.php';
require_once '../Model/Cesta.php';
require_once '../Model/Usuario.php';

if(session_status() === PHP_SESSION_NONE) session_start();
// buscamos el producto que vamos a usar
$id = $_REQUEST['id'];
$data['producto'] = Productos::getProductosByCodigo($id);

$numReponer = intval($_REQUEST['reponer']);
if ($numReponer > 0) {
    $data['producto']->reponer($numReponer);
}
// Carga la vista de listado
header('Location:'.getenv('HTTP_REFERER'));
