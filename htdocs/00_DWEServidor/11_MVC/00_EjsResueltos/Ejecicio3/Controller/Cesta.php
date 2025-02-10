<?php
if (session_status() == PHP_SESSION_NONE) session_start();
require_once '../Model/Producto.php';
$data['productos']=[];
foreach ($_SESSION['productos'] as $prod => $cantidad) {
    $data['productos'][]=[Producto::getProductoById($prod),$cantidad];
}  
include_once '../View/Cesta_V.php';
