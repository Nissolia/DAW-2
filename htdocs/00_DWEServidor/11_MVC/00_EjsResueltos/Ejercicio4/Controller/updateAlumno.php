<?php 
include "../Model/Alumno.php";
$alumno=new Alumno($_POST['matricula'], $_POST['nombre'], $_POST['apellidos'], $_POST['curso']);
$alumno->update();
header("location: index.php");