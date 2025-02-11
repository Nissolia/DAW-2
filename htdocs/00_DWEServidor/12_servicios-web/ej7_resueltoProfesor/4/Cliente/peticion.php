<?php
$url="http://localhost//Curso%20Actual/Ejer-LIBRO/Unidad%2012/Ejercicios%2012.6/4/Servidor/servicioEscuela.php";
if (isset($_POST['filtraGrupo'])) {
    //usamos la funcion urlencode para que no de error con los espacios en blanco al enviar un parametro GET
    echo "<h1>GRUPO: ". $_POST['grupo'] ."</h1>";
    $parametros = '?grupo=' . urlencode($_POST['grupo']) . '&tipo=grupo';
    mostrarAlumnos($url, $parametros);
} else if (isset($_POST['filtraAlumno'])) {
    echo "<h1>Nombres que contienen: \"". $_POST['nombre'] ."\"</h1>";
    $parametros = "?nombre=" . urlencode($_POST['nombre']) . '&tipo=alumnos';
    mostrarAlumnos($url, $parametros);        
} else if (isset($_POST['filtraAsignatura'])) {
    echo "<h1>Matrículaciones del alumno: ". $_POST['matricula'] ."</h1>";
    $parametros = "?matricula=" . $_POST['matricula'] . '&tipo=asignaturas';
    mostrarAsignaturas($url, $parametros);        
} else if (isset($_POST['matricular'])) {
    $datos = ["matricula" =>  $_REQUEST['matricula'], "codigo" =>  $_REQUEST['codigo']];
    hacerPeticion($datos, "POST",$url);  
} else if (isset($_POST['borrar'])) {
    $datos = ["matricula" =>  $_REQUEST['matricula']];
    hacerPeticion($datos, "DELETE",$url);
} else if (isset($_POST['cambiaGrupo'])) {
    $datos = ["matricula" =>  $_REQUEST['matricula'], "grupo" =>  $_REQUEST['grupo']];
    hacerPeticion($datos, "PUT",$url);
}
function mostrarEstado($codEstado, $mensaje) {
    echo "STATUS: ".$codEstado;
    echo "<br>".$mensaje;
    echo "<br><h4><a href='index.php'>VOLVER</a></h4>";
}
function mostrarAlumnos($url, $parametros) {
    $data = @file_get_contents($url . $parametros);
    $resultado = json_decode($data);
    $codEstado=substr($http_response_header[0],9,3);
    $mensaje=substr($http_response_header[0],13);
    if ($codEstado==200) {
        echo "<table border='1'><tr><th>Nombre</th><th>Apellidos</th><th>Matricula</th></tr>";
        foreach ($resultado->alumnos as $alumno) {
            echo "<tr><td>".$alumno->nombre."</td>";
            echo "<td>".$alumno->apellidos."</td>";
            echo "<td>".$alumno->matricula."</td></tr>";
        }
        echo "</table>";
        echo "<br><h4><a href='index.php'>VOLVER</a></h4>";
    }else {
        mostrarEstado($codEstado, $mensaje);
    }
}
function mostrarAsignaturas($url, $parametros) {
    $data = @file_get_contents($url . $parametros);
    $resultado = json_decode($data);
    $codEstado=substr($http_response_header[0],9,3);
    $mensaje=substr($http_response_header[0],13);
    if ($codEstado==200) {
        echo "<table border='1'><tr><th>Código</th><th>Asignatura</th></tr>";
        foreach ($resultado->asignaturas as $asignatura) {
            echo "<tr><td>".$asignatura->codigo."</td>";
            echo "<td>".$asignatura->nombre."</td></tr>";
        }
        echo "</table>";
        echo "<br><h4><a href='index.php'>VOLVER</a></h4>";
    }else{
        mostrarEstado($codEstado, $mensaje);
    }
    echo "<br><h4><a href='index.php'>VOLVER</a></h4>";
}
function hacerPeticion ($datos, $metodo, $url){
    $opciones = [
        "http" => [
            "header" => "Content-type: application/x-www-form-urlencoded\r\n",
            "method" => $metodo,
            "content" => http_build_query($datos) # Agregar el contenido del formulario definido anteriormente en $datos
        ],
    ];
    $contexto = stream_context_create($opciones);
    @file_get_contents($url, false, $contexto);
    $codEstado = substr($http_response_header[0],9,3);
    $mensaje = substr($http_response_header[0],12);
    mostrarEstado($codEstado, $mensaje);
}