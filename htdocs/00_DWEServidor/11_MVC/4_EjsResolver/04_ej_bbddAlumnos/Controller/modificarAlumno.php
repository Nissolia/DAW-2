<?php
require_once '../Model/Alumno.php';

$data['alumnoId'] = Alumno::getAlumnoByMatricula($_REQUEST['id']);

include '../View/modificarAlumno_v.php';
