<?php 
require_once 'Alumno.php';
require_once 'AlumnoAsignatura.php';
$codEstado = 400;
$mensaje = 'Solicitud incorrecta';
$metodo = $_SERVER['REQUEST_METHOD'];
$devolver = [];

if ($metodo == 'DELETE') {
    parse_str(file_get_contents("php://input"), $parametros);
    $alumno = Alumno::getAlumnoByMatricula((int)$parametros['matricula']);
}

if ($metodo == 'PUT') {
    parse_str(file_get_contents("php://input"), $parametros);
    
}
setCabecera($codEstado, $mensaje);
echo json_encode($devolver);


?>