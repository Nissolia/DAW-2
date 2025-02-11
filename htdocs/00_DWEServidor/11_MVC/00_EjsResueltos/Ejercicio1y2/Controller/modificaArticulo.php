<?php
require_once '../Model/Articulos.php';
if (!isset($_REQUEST['codigo'])) {
    header('location:../Controller/index.php');
}
$articulo= Articulos::getArticuloById($_REQUEST['codigo']);
$data['destino']="updateArticulo.php";
$data['contenido']=$articulo->getContenido();
$data['fecha']=$articulo->getFecha();
$data['titulo']=$articulo->getTitulo();
$data['codigo']=$_REQUEST['codigo'];
include "../View/formularioArticulo_V.php";