<?php 


require_once '../Model/Usuario.php';
require_once '../Model/Productos.php';
// Obtiene todas las ofertas
// hay que ponerlo con $data
$data['productoId'] = Productos::getProductosByCodigo($_REQUEST['id']);
// print_r($data['articuloId']);


include '../View/modificarProducto_v.php';



?>