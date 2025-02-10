<?php 
include "../Model/Asignatura.php";
include "../Model/AlumnoAsignatura.php";
$asignatura=new Asignatura($_POST['codigo']);
$matriculacion=new AlumnoAsignatura("",$_POST['codigo']);
$matriculacion->deleteAsignatura();
$asignatura->delete();
header("location: asignaturas.php");