<?php
session_start();
require_once '../Model/Alumno.php';
require_once '../Model/Asignatura.php';
require_once '../Model/AlumnoAsignatura.php';
if (isset($_POST['codigo'])) {
	$_SESSION['codigo']=$_POST['codigo'];
}elseif (!isset($_SESSION['codigo'])) {
	header("Location:../Controller/index.php");
}
$data['alumnos']=AlumnoAsignatura::getAlumnosByAsig($_SESSION['codigo']);
$data['asignatura']=Asignatura::getAsignaturaById($_SESSION['codigo']);
include '../View/alumnosMat_V.php';