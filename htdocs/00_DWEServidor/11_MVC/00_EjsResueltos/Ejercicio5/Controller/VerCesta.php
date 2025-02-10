<?php
if (session_status() == PHP_SESSION_NONE) session_start();
if (!isset($_SESSION['usuario'])) {
    header("location:../Controller/login.php");
}
require_once '../Model/Producto.php';
require_once '../Model/Cesta.php';
$contenidoCesta=Cesta::getCestaByCliente($_SESSION['id_usuario']);
$data['productos']=[];
foreach ($contenidoCesta as $cesta) {
    if ($producto=Producto::getProductoById($cesta->getCod_producto())) {
        $data['productos'][]=[
            'codigo'=>$producto->getCodigo(),
            'imagen'=>$producto->getImagen(),
            'cantidad'=>$cesta->getCantidad(),
            'precio'=>$producto->getPrecio()
        ];
    }
}

include_once '../View/VerCesta_V.php';
