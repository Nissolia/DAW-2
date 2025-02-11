<?php 
if (isset($_POST['insertar'])) {
  require_once '../Model/Producto.php';
  // sube la imagen al servidor
  move_uploaded_file($_FILES["imagen"]["tmp_name"], "../View/imagen/" . $_FILES["imagen"]["name"]);

  // inserta la oferta en la base de datos
  $producto = new Producto(null, $_POST['nombre'], $_POST['precio'], $_FILES["imagen"]["name"]);
  $producto->insert();
  header("Location: index.php");
}else{
  include "../View/formularioProducto.php";
}

?>