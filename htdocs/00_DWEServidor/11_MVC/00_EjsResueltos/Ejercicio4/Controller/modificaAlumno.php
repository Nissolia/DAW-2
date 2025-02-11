<?php 
require_once '../Model/Alumno.php';
$data['destino']="updateAlumno.php";
$alumno=Alumno::getAlumnoById($_POST['matricula']);
$data['matricula']=$alumno->getMatricula();
$data['nombre']=$alumno->getNombre();
$data['apellidos']=$alumno->getApellidos();
$data['curso']=$alumno->getCurso();
$data['bloqueado']=' readonly ';
include "../View/formularioAlumno_V.php";