<?php 
include "../Model/Asignatura.php";
$asignatura=new Asignatura(null, $_POST['nombre']);
$asignatura->insert();
header("location: asignaturas.php");