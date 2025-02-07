<?php
require_once '../Model/Articulo.php';
// inserta la Articulo en la base de datos
$data['artUpdate']  = new Articulo($_REQUEST['id']);
$data['artUpdate']->update($_REQUEST['id'],$_POST['titulo'], $_POST['contenido']);

header("Location: index.php");
