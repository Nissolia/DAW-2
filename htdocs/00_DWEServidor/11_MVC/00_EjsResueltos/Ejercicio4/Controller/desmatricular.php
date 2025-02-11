<?php 
if (session_status() == PHP_SESSION_NONE) session_start();
require_once '../Model/Alumno.php';
require_once '../Model/Asignatura.php';
require_once '../Model/AlumnoAsignatura.php';
$matriculacion=new AlumnoAsignatura($_POST['matricula'], $_POST['codigo']);
$matriculacion->delete();
//header("location: asignaturasMat.php");
header("location:".getenv('HTTP_REFERER')); //vover página atrás porque esta página es llamada desde 2 páginas distintas