<?php
session_start();
if (!isset($_SESSION['matricula'])) {
    header('Location:../Controller/index.php');
}
require_once '../Model/Alumno.php';
require_once '../Model/Asignatura.php';
require_once '../Model/AlumnoAsignatura.php';
$data['asignaturas']=AlumnoAsignatura::getAsignaturasLibres($_SESSION['matricula']);
$data['alumno']=Alumno::getAlumnoById($_SESSION['matricula']);
include '../View/matricular_V.php';