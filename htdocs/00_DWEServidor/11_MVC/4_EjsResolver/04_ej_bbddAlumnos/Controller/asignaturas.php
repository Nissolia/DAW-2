<?php 
require_once '../Model/Asignatura.php';

// Obtiene todos los productos
$data['asignatura'] = Asignatura::getAsignatura();

// Carga la vista de listado
include '../View/asignaturas_v.php';
