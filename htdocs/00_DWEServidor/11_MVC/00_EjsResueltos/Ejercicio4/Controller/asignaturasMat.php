<?php
if (session_status() == PHP_SESSION_NONE) session_start();
require_once '../Model/Alumno.php';
require_once '../Model/Asignatura.php';
require_once '../Model/AlumnoAsignatura.php';
if (isset($_POST['matricula'])) {
	$_SESSION['matricula']=$_POST['matricula'];
}elseif (!isset($_SESSION['matricula'])) {
	header("Location:../Controller/index.php");
}
$data['asignaturas']=AlumnoAsignatura::getAsignaturasByAlu($_SESSION['matricula']);
$data['alumno']=Alumno::getAlumnoById($_SESSION['matricula']);
include '../View/asignaturasMat_V.php';