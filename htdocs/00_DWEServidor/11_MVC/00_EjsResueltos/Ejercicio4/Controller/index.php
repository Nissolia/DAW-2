<?php
require_once '../Model/Alumno.php';

$data['alumnos'] = Alumno::getAlumnos();
// Carga la vista principal de listado
include '../View/index_V.php';