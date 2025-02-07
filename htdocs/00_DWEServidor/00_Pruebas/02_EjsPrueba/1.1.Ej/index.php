<?php
include_once 'Alumno.php';

if (session_status() === PHP_SESSION_NONE) session_start();

// Inicializamos las sesiones si no existen.
if (!isset($_SESSION['alumnos'])) {
    $_SESSION['alumnos'] = [];
}

if (!isset($_SESSION['notas'])) {
    $_SESSION['notas'] = 0;
}

// Procesamos los datos enviados por el formulario.
if (isset($_POST['alumno'], $_POST['curso'], $_POST['notas'])) {
    $nombre = trim($_POST['alumno']);
    $curso = trim($_POST['curso']);
    $notas = trim($_POST['notas']);

    if (!empty($nombre) && !empty($curso) && !empty($notas)) {
        // Creamos el objeto Alumno.
        $alumno = new Alumno($nombre, $curso);
        $alumno->insertarNotas($notas);

        // Lo añadimos a la sesión.
        $_SESSION['alumnos'][] = $alumno;
    } else {
        echo "<p style='color:red;'>Por favor, completa todos los campos correctamente.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h2>Listado de Alumnos</h2>
    <form action="#" method="post">
        <input type="text" name="alumno" placeholder="Nombre del alumno" required>
        <input type="text" name="curso" placeholder="Curso del alumno" required><br>
        <input type="text" name="notas" placeholder="Notas separadas por comas" required>
        <input class="boton" type="submit" value="Añadir alumno">
    </form>

    <table border="1">
        <thead>
            <tr>
                <th>Alumno</th>
                <th>Curso</th>
                <th>Notas</th>
                <th>Media Notas</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Mostramos la lista de alumnos almacenados en la sesión.
            if (!empty($_SESSION['alumnos'])) {
                foreach ($_SESSION['alumnos'] as $elto) {
                    echo "<tr>";
                    echo "<td>" . ($elto->getNombre()) . "</td>";
                    echo "<td>" . ($elto->getCurso()) . "</td>";
                    echo "<td>" . implode(", ", $elto->getNotas()) . "</td>";
                    echo "<td>" . ($elto->mediaNotas()) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No hay alumnos registrados.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>
