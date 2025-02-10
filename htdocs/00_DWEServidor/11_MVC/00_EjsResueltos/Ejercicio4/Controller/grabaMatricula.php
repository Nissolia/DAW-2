<?php 
include "../Model/AlumnoAsignatura.php";
$matriculacion=new AlumnoAsignatura($_POST['matricula'], $_POST['codigo']);
$matriculacion->insert();
header("location: asignaturasMat.php");