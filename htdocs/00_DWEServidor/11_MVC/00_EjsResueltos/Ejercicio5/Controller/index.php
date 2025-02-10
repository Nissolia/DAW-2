<?php
if (session_status() == PHP_SESSION_NONE) session_start();
if (!isset($_SESSION['usuario'])) {
    header("location:../Controller/login.php");
}
require_once '../Model/Producto.php';
require_once '../Model/Cesta.php';
require_once '../Model/Usuario.php';

// Obtiene todos los articulos
$data['productos'] = Producto::getProductos();
$usuario=Usuario::getUsuarioById($_SESSION['id_usuario']);
//carga la vista con el listado de productos
if ($usuario->getrol()=="admin") {
    include '../View/index_admin_V.php';
} else {
    $data['cantidad'] = Cesta::getCantidadByCliente($_SESSION['id_usuario']);
    comprobarStockCesta();
    include '../View/index_cliente_V.php';
}
function comprobarStockCesta (){
    $contenidoCesta=Cesta::getCestaByCliente($_SESSION['id_usuario']);
    foreach ($contenidoCesta as $cesta) {
        $producto=Producto::getProductoById($cesta->getCod_producto());
        if ($producto->getStock()<$cesta->getCantidad()){
            if ($producto->getStock()==0){
                $cesta->delete();
            }else{
                $diferencia=$producto->getStock()-$cesta->getCantidad();
                $cesta->añadir($diferencia); //añade la diferencia en negativo, luego resta las unidades insuficientes
            }

        }
    }
}

