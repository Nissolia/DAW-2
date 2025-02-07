<?php
require_once 'Producto.php';
$metodo = $_SERVER['REQUEST_METHOD'];
$codEstado = 200;
$mensaje = "OK";
if ($metodo == 'GET') {
    if (isset($_REQUEST['min']) && isset($_REQUEST['max'])) {
        $productos = Productos::getProductosFiltroPrecio($_REQUEST['min'], $_REQUEST['max']);
    } else if (isset($_REQUEST['nombre'])) {
        $productos = Productos::getProductosFiltroNombre($_REQUEST['nombre']);
    }
    if (count($productos) == 0) {
        $mensaje = "PRODUCTO NO ENCONTRADO";
        $codEstado = 404;
    } else {
        foreach ($productos as $producto) {
            $devolver[] = [
                'nombre' => $producto->getNombre(),
                'precio' => $producto->getPrecio(),
                'stock' => $producto->getStock()
            ];
        }
    }
} else if ($metodo == 'POST') {
    $producto = Productos::getProductoByNombre($_REQUEST['nombre']);
    if ($producto) {
        $mensaje = "CONFLICTO, PRODUCTO CON MISMO NOMBRE";
        $codEstado = 409;
    } else {
        $producto = new Productos(null, $_REQUEST['nombre'], $_REQUEST['precio'], null, $_REQUEST['stock']);
        $producto->insert();
        $mensaje = "PRODUCTO INSERTADO CORRECTAMENTE";
        $codEstado = 200;
    }
} else if ($metodo == 'DELETE') {
    //Para los métodos GET y POST existe $_REQUEST, pero para PUT y DELETE no, así que parseamos ‘php://input’
    parse_str(file_get_contents("php://input"), $parametros);
    $producto = Productos::getProductoByNombre($parametros['nombre']);
    if ($producto) {
        $producto->delete();
        $mensaje = "PRODUCTO BORRADO CORRECTAMENTE";
        $codEstado = 200;
    } else {
        $mensaje = "PRODUCTO NO ENCONTRADO";
        $codEstado = 404;
    }
} else if ($metodo == 'PUT') {
    //Para los métodos GET y POST existe $_REQUEST, pero para PUT y DELETE no, así que parseamos ‘php://input’
    parse_str(file_get_contents("php://input"), $parametros);
    $producto = Productos::getProductoByNombre($parametros['nombre']);
    if ($producto) {
        $producto->añade($parametros['cantidad']);
        $mensaje = "STOCK AÑADIDO CORRECTAMENTE";
        $codEstado = 200;
    } else {
        $mensaje = "PRODUCTO NO ENCONTRADO";
        $codEstado = 404;
    }
}
setCabecera($codEstado, $mensaje);
echo json_encode($devolver);
function setCabecera($codEstado, $mensaje)
{
    header("HTTP/1.1 $codEstado $mensaje");
    header("Content-Type: application/json;charset=utf-8");
}
