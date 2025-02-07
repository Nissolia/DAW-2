<?php
// Incluir la librería con la función de conexión
include_once 'libreria.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Índice</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
// Conectar a la base de datos usando la función pedirConexion
$conexion = pedirConexion('horario', 'escuela');

// Obtener el horario semanal
$stmt = $conexion->query("SELECT * FROM horario");

// Verificar si la consulta devuelve resultados
if ($stmt->rowCount() > 0) {
    // Mostrar la tabla con el horario
    echo "<h1>Horario de Clases</h1>";
    echo "<table>";
    echo "<tr><th>Día</th><th>Primera</th><th>Segunda</th><th>Tercera</th><th>Cuarta</th><th>Quinta</th><th>Sexta</th></tr>";

    // Recorrer cada fila del resultado usando fetchObject()
    while ($columna = $stmt->fetchObject()) {
        echo "<tr>";
        echo "<td>" . $columna->dia . "</td>";
        
        // Mostramos las asignaturas de las horas usando las propiedades del objeto
        echo "<td><a href='actualizar.php?dia=" . $columna->dia . "&hora=1'>" . $columna->primera . "</a></td>";
        echo "<td><a href='actualizar.php?dia=" . $columna->dia . "&hora=2'>" . $columna->segunda . "</a></td>";
        echo "<td><a href='actualizar.php?dia=" . $columna->dia . "&hora=3'>" . $columna->tercera . "</a></td>";
        echo "<td><a href='actualizar.php?dia=" . $columna->dia . "&hora=4'>" . $columna->cuarta . "</a></td>";
        echo "<td><a href='actualizar.php?dia=" . $columna->dia . "&hora=5'>" . $columna->quinta . "</a></td>";
        echo "<td><a href='actualizar.php?dia=" . $columna->dia . "&hora=6'>" . $columna->sexta . "</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No hay datos disponibles.";
}

$conexion = null; // Cerrar la conexión a la base de datos
?>

</body>
</html>
