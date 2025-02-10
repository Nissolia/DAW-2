<?php 
  if (isset($_POST['unidades'])) {
    require_once '../Model/Producto.php';
    $producto = Producto::getProductoById($_POST['prod']);
    $producto->añade($_POST['unidades']);
    header("Location: index.php");
  }else{
  	include_once '../View/añadeProducto_V.php';
  }
  