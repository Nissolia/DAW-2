<?php
require_once '../Model/Alumno.php';

// si dan el id
if (isset($_REQUEST['id'])) {
    $data['alumUpdate']  = new Alumno($_REQUEST['id']);
    $data['alumUpdate']->update($_REQUEST['nombre'], $_REQUEST['apellidos'], $_REQUEST['curso'], $_REQUEST['id']);
}
header("Location: index.php");
