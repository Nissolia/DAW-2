<?php 
include "../Model/Articulos.php";
$articulo=new Articulos($_POST['codigo'], $_POST['titulo'], "", $_POST['contenido']);
$articulo->update();
header("location: index.php");
?>
