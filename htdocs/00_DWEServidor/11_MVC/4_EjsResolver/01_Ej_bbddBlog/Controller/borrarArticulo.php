<?php
require_once '../Model/Articulo.php';
$data['ArtDelete']  = new Articulo($_GET['id']);
$data['ArtDelete'] ->delete();
header("Location: index.php");