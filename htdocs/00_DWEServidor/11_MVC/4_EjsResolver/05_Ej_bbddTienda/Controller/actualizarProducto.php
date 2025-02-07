<?php
require_once '../Model/Productos.php';

$data['productoAct']  = new Productos($_REQUEST['id'],$_REQUEST['nombre'], $_REQUEST['precio'],$_REQUEST['imagen'],$_REQUEST['stock']);
$data['productoAct']->update();

header("Location: index.php");
