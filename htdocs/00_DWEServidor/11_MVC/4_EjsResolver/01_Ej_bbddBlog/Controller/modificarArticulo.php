<?php
require_once '../Model/Articulo.php';
// Obtiene todas las ofertas
// hay que ponerlo con $data
$data['articuloId'] = Articulo::getArticuloById($_GET['id']);
// print_r($data['articuloId']);


include '../View/modificarArticulo_view.php';
