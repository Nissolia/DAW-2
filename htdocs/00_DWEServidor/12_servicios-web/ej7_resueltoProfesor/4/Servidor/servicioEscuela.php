<?php
   
   require_once 'Alumno.php';
   require_once 'AlumnoAsignatura.php';
   $codEstado=400;
   $mensaje='Solicitud incorrecta';
   $metodo = $_SERVER['REQUEST_METHOD'];
   $devolver = [];
   if ($metodo == 'GET') {
     if ($_REQUEST['tipo']=='alumnos') {
       $resultado = Alumno::getAlumnosFiltroNombre($_REQUEST['nombre']);
       foreach ($resultado as $fila) {
          $devolver['alumnos'][] = ['matricula'=>$fila->getMatricula(),'nombre'=>$fila->getNombre(), 'apellidos'=>$fila->getApellidos(), 'curso'=>$fila->getCurso()];
       }
     } else if ($_REQUEST['tipo']=='grupo') {
       $resultado = Alumno::getAlumnosFiltroGrupo($_REQUEST['grupo']);
       foreach ($resultado as $fila) {
          $devolver['alumnos'][] = ['matricula'=>$fila->getMatricula(),'nombre'=>$fila->getNombre(), 'apellidos'=>$fila->getApellidos()];
        }
    } else if ($_REQUEST['tipo']=='asignaturas') {
        $resultado = AlumnoAsignatura::getAsignaturasByAlu($_REQUEST['matricula']);
        foreach ($resultado as $fila) {
           $devolver['asignaturas'][] = ['codigo'=>$fila->getCodigo(),'nombre'=>$fila->getNombre()];
       }
     }
     if (count($resultado) == 0) {
       $mensaje = "SIN RESULTADOS";
       $codEstado = 404;
     } else {
       $mensaje = "OK";
       $codEstado = 200;
     }
   } else if ($metodo == 'POST') {
       $matriculacion = AlumnoAsignatura::getMatricula ($_REQUEST['matricula'], $_REQUEST['codigo']);
       if ($matriculacion) {
           $mensaje = "CONFLICTO, YA EXISTE LA MATRICULACION";
           $codEstado = 409;
          }else {
            $matriculacion= new AlumnoAsignatura($_REQUEST['matricula'], $_REQUEST['codigo']);
            if ($matriculacion->insert()) {
              $mensaje = "OK";
              $codEstado = 200;
            } else {
             $mensaje = "MATRICULA DE ALUMNO O CODIGO DE ASIGNATURA INCORRECTO";
             $codEstado = 400;
           }
           
       }
   }else if ($metodo == 'DELETE') {
       parse_str(file_get_contents("php://input"),$parametros); //recuperamos los parametros recibidos en la peticion
       $alumno = Alumno::getAlumnoById($parametros['matricula']);
       if ($alumno) {
         $matriculas=new AlumnoAsignatura($parametros['matricula'],null);
         $matriculas->deleteAlumno(); //borramos primero todas las matriculaciones de ese alumno
         $alumno->delete();
         $mensaje = "OK";
         $codEstado=200;
       }else {
         $mensaje = "ALUMNO NO ENCONTRADO";
         $codEstado=404;
       }
   }else if ($metodo == 'PUT') {
       parse_str(file_get_contents("php://input"),$parametros); //recuperamos los parametros recibidos en la peticion
       $alumno = Alumno::getAlumnoById($parametros['matricula']);
       if ($alumno) {
         $alumno->cambioGrupo($parametros['grupo']);
         $mensaje = "OK";
         $codEstado=200;
       }else {
         $mensaje = "ALUMNO NO ENCONTRADO";
         $codEstado=404;
       }
     }
     setCabecera($codEstado,$mensaje); 
     echo json_encode($devolver);
     
   function setCabecera($codEstado, $mensaje) {  
     //Si usamos la funcion setCabecera y establecemos en header un codigo distinto de 200 (status OK) provocará un error en el cliente, 
     //por eso es mejor tratar el error en la respuesta devuelta en el array $devolver y el cliente pueda analizar el mensaje
     header("HTTP/1.1 $codEstado $mensaje");  
     header("Content-Type: application/json;charset=utf-8");  
   }  