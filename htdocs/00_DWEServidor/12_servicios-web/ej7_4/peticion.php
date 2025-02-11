<?php
function hacerPeticion($datos, $metodo, $url) {
    $opciones = [
        "http" => [
            "header" => "Content-type: application/x-www-form-urlencoded\r\n",
            "method" => $metodo,
            "content" => http_build_query($datos)
        ]
    ];
    $contexto = stream_context_create($opciones);
    return file_get_contents($url, false, $contexto);
}

function mostrarEstado($codEstado, $mensaje) {
    echo "STATUS: " . $codEstado;
    echo "<br>" . $mensaje;
    echo "<br><h4><a href='index.php'>VOLVER</a></h4>";
}

function mostrarAlumnos($url, $parametros) {
    $data = @file_get_contents($url . $parametros);
    $resultado = json_decode($data);
    $codEstado = substr($http_response_header[0], 9, 3);
    $mensaje = substr($http_response_header[0], 13);

    if ($codEstado == 200) {
        echo "<table border='1'><tr><th>Nombre</th><th>Apellidos</th><th>Matricula</th></tr>";
        foreach ($resultado->alumnos as $alumno) {
            echo "<tr><td>" . $alumno->nombre . "</td>";
            echo "<td>" . $alumno->apellidos . "</td>";
            echo "<td>" . $alumno->matricula . "</td></tr>";
        }
        echo "</table>";
        echo "<br><h4><a href='index.php'>VOLVER</a></h4>";
    } else {
        mostrarEstado($codEstado, $mensaje);
    }
}

function mostrarAsignaturas($url, $parametros) {
    $data = @file_get_contents($url . $parametros);
    $resultado = json_decode($data);
    $codEstado = substr($http_response_header[0], 9, 3);
    $mensaje = substr($http_response_header[0], 13);

    if ($codEstado == 200) {
        echo "<table border='1'><tr><th>Código</th><th>Asignatura</th></tr>";
        foreach ($resultado->asignaturas as $asignatura) {
            echo "<tr><td>" . $asignatura->codigo . "</td>";
            echo "<td>" . $asignatura->nombre . "</td></tr>";
        }
        echo "</table>";
        echo "<br><h4><a href='index.php'>VOLVER</a></h4>";
    } else {
        mostrarEstado($codEstado, $mensaje);
    }
}

$url = "http://localhost/servicioEscuela.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tipo = $_POST['tipo'];
    if ($tipo == 'alumnos') {
        mostrarAlumnos($url, "?tipo=alumnos");
    } else if ($tipo == 'asignaturas') {
        mostrarAsignaturas($url, "?tipo=asignaturas");
    }
}
?>