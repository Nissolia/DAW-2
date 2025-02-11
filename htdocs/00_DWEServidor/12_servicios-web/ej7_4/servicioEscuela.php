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


?><?php
require_once 'Alumno.php';
require_once 'AlumnoAsignatura.php';

$codEstado = 400;
$mensaje = 'Solicitud incorrecta';
$metodo = $_SERVER['REQUEST_METHOD'];

if ($metodo == 'GET') {
    if ($_REQUEST['tipo'] == 'alumnos') {
        $resultado = Alumno::getAlumnosFiltroNombre($_REQUEST['nombre']);
        foreach ($resultado as $fila) {
            $devolver['alumnos'][] = ['matricula' => $fila->getMatricula(), 'nombre' => $fila->getNombre()];
        }
    } else if ($_REQUEST['tipo'] == 'grupo') {
        $resultado = Alumno::getAlumnosFiltroGrupo($_REQUEST['grupo']);
        foreach ($resultado as $fila) {
            $devolver['alumnos'][] = ['matricula' => $fila->getMatricula(), 'nombre' => $fila->getNombre()];
        }
    } else if ($_REQUEST['tipo'] == 'asignaturas') {
        $resultado = AlumnoAsignatura::getAsignaturasByAlu($_REQUEST['matricula']);
        foreach ($resultado as $fila) {
            $devolver['asignaturas'][] = ['codigo' => $fila->getCodigo(), 'nombre' => $fila->getNombre()];
        }
    }

    if (count($resultado) == 0) {
        $mensaje = "SIN RESULTADOS";
        $codEstado = 404;
    } else {
        $mensaje = "OK";
        $codEstado = 200;
    }
} else if ($metodo == 'DELETE') {
    parse_str(file_get_contents("php://input"), $parametros);
    $alumno = Alumno::getAlumnoById($parametros['matricula']);
    if ($alumno) {
        $matriculas = new AlumnoAsignatura($parametros['matricula'], null);
        $matriculas->deleteAlumno();
        $alumno->delete();
        $mensaje = "OK";
        $codEstado = 200;
    } else {
        $mensaje = "ALUMNO NO ENCONTRADO";
        $codEstado = 404;
    }
} else if ($metodo == 'POST') {
    $matriculacion = AlumnoAsignatura::getMatricula($_REQUEST['matricula']);
    if ($matriculacion) {
        $mensaje = "CONFLICTO, YA EXISTE LA MATRICULACION";
        $codEstado = 409;
    } else {
        $matriculacion = new AlumnoAsignatura($_REQUEST['matricula'], $_REQUEST['codigo']);
        if ($matriculacion->insert()) {
            $mensaje = "MATRICULACION CORRECTA";
            $codEstado = 200;
        } else {
            $mensaje = "MATRICULA DE ALUMNO O CODIGO DE ASIGNATURA INCORRECTO";
            $codEstado = 400;
        }
    }
}

header("HTTP/1.1 $codEstado $mensaje");
header('Content-Type: application/json');
echo json_encode($devolver);
?>