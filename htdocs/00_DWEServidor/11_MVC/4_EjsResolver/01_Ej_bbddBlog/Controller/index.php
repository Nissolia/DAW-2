<?php require_once '../Model/Articulo.php';
// Obtiene todas las ofertas
$data['articulos'] = Articulo::getArticulos();
// Carga la vista de listado
include '../View/index_view.php';