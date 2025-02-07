<?php
require_once '../Model/Productos.php';

$data['productoAct']  = new Productos(null,$_REQUEST['nombre'], $_REQUEST['precio'],$_REQUEST['imagen'],$_REQUEST['stock']);
$data['productoAct']->insert();

header("Location: index.php");
