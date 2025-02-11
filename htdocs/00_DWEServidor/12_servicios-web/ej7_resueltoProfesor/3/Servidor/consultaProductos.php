<?php
require_once 'Producto.php';
require_once 'Cliente.php';
const RUTA="http://localhost//Curso%20Actual/Ejer-LIBRO/Unidad%2012/Ejercicios%2012.6/3/Servidor/img/";
if (!isset($_REQUEST['user']) || !isset($_REQUEST['token'])) {
  $mensaje = "FALTA TOKEN DE ACCESO";
  $codEstado = 400;
} else {
  if (Cliente::comprueba($_GET['user'], $_GET['token'])) {
    $cliente = Cliente::getClienteById($_GET['user']);
    $cliente->sumaConsulta();
    $productos=[];
    if (isset($_GET['min']) && isset($_GET['max'])) {
      $productos = Producto::getProductosFiltroPrecio($_GET['min'], $_GET['max']);
    } else if(isset($_REQUEST['nombre'])) {
      $productos = Producto::getProductosFiltroNombre($_GET['nombre']);
    }else{
      $mensaje = "Faltan paramatros de la consulta";
      $codEstado = 400;
    }
    if (count($productos) == 0) {
      $mensaje = "PRODUCTO NO ENCONTRADO";
      $codEstado = 404;
    } else {
      $mensaje = "OK";
      $codEstado = 200;
      foreach ($productos as $producto) {
        $devolver[] = ['nombre' => $producto->getNombre(), 'precio' => $producto->getPrecio(), 'imagen' => RUTA . $producto->getImagen()];
      }
    }
  } else {
    $mensaje = "USUARIO NO AUTORIZADO";
    $codEstado = 401;
  }
}
//si comentamos las dos instrucciones header, el codigo y mensaje solo se incluyen en los datos pero no en la cabecera de respuesta
header("HTTP/1.1 $codEstado $mensaje");  
header("Content-Type: application/json;charset=utf-8");
echo json_encode($devolver);
