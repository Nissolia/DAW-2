<?php 
include "../Model/Alumno.php";
include "../Model/AlumnoAsignatura.php";
$alumno=new Alumno($_POST['matricula']);
$matriculacion=new AlumnoAsignatura($_POST['matricula'],0);
$matriculacion->deleteAlumno();
$alumno->delete();
header("location: index.php");