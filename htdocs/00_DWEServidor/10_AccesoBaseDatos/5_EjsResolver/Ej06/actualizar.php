<?php
// Incluir la librería con la función de conexión
include_once 'libreria.php';
// Conectar a la base de datos usando la función pedirConexion
$conexion = pedirConexion('horario', 'escuela');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizando</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    if (isset($_GET['dia']) && isset($_GET['hora'])) {
        $dia = $_GET['dia'];
        $hora = $_GET['hora'];

        // Obtener el horario actual del día y la hora seleccionada
        $query = "SELECT * FROM horario WHERE dia '.$dia.'";
        $stmt = $conexion->prepare("SELECT * FROM horario WHERE dia '.$dia.'");
        $stmt->execute(['dia' => $dia]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Lista de asignaturas posibles
        $asignaturas = ['Matemáticas', 'Física', 'Química', 'Historia', 'Inglés', 'Biología', 'Geografía', 'Lengua', 'Tecnología', 'Plástica', 'Música', 'Filosofía', 'Educación Física'];

        // Formulario de actualización
        echo "<h1>Actualizar Horario - $dia</h1>";
        echo "<form action='actualizar.php' method='post'>";
        echo "<input type='hidden' name='dia' value='$dia'>";
        echo "<input type='hidden' name='hora' value='$hora'>";
        echo "<label for='asignatura'>Asignatura:</label>";
        echo "<select name='asignatura' id='asignatura'>";
        foreach ($asignaturas as $asignatura) {
            $selected = ($row["$hora"] == $asignatura) ? "selected" : "";
            echo "<option value='$asignatura' $selected>$asignatura</option>";
        }
        echo "</select><br>";
        echo "<input type='submit' name='actualizar' value='Actualizar'>";
        echo "</form>";
    }

    // Actualizar el horario en la base de datos
    if (isset($_POST['actualizar'])) {
        $dia = $_POST['dia'];
        $hora = $_POST['hora'];
        $asignatura = $_POST['asignatura'];

        // Actualizar la asignatura en la base de datos
        $query = "UPDATE horario SET $hora = :asignatura WHERE dia = :dia";
        $stmt = $conexion->prepare($query);
        if ($stmt->execute(['asignatura' => $asignatura, 'dia' => $dia])) {
            echo "<p>Horario actualizado correctamente.</p>";
            echo "<a href='index.php'>Volver al horario</a>";
        } else {
            echo "Error al actualizar el horario.";
        }
    }

    $conexion = null; // Cerrar la conexión a la base de datos
    ?>

</body>

</html>