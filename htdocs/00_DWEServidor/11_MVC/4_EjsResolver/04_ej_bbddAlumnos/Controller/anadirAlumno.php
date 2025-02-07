<?php 
require_once '../Model/Alumno.php';
// Carga la vista de listado

$data['anadirAlumno'] = new Alumno($_REQUEST['matricula'], $_REQUEST['nombre'],$_REQUEST['apellidos'],$_REQUEST['curso']);
$data['anadirAlumno']->insert();
header("Location: index.php");