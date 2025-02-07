<?php 
require_once '../Model/Alumno.php';

// Obtiene todos los productos
$data['alumno'] = Alumno::getAlumno();

// Carga la vista de listado
include '../View/index_v.php';
