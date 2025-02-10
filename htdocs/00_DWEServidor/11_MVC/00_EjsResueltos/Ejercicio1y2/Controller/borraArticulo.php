<?php 
require "../Model/Articulos.php";
if (!isset($_REQUEST['codigo'])) {
    header('location:../Controller/index.php');
}
if (isset($_REQUEST['si'])) {
    $articulo=new Articulos($_REQUEST['codigo']);
    $articulo->delete();
    header("location: ../Controller/index.php");
}else{
    include "../View/borraArticulo_V.php";
}