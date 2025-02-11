<?php 
include "../Model/Articulos.php";
$articulo=new Articulos(null, $_POST['titulo'], null, $_POST['contenido']);
$articulo->insert();
header("location: ../Controller/index.php");