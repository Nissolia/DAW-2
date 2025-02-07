<?php
require_once '../Model/Articulo.php';
// inserta la Articulo en la base de datos
$data['ArtInsert'] = new Articulo("", $_POST['titulo'],time(),$_POST['contenido']);
$data['ArtInsert']->insert();
header("Location: index.php");