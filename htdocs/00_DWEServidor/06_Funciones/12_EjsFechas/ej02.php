<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej 2</title>
</head>
<body>
     <!-- Ejercicio 2 -->
     <h2>Ejercicio 2: Introducir una hora</h2>
    <form action="" method="post">
        Hora: <input type="number" name="hora" min="0" max="23" required><br>
        Minutos: <input type="number" name="minuto" min="0" max="59" required><br>
        Segundos: <input type="number" name="segundo" min="0" max="59" required><br>
        Elije el formato:
        <select name="formatoHora" required>
            <option value="H:i:s">HH:MM:SS</option>
            <option value="h:i A">hh:MM AM/PM</option>
        </select>
        <input type="submit" value="Enviar">
    </form>

    <?php 
    if (isset($_POST['hora'], $_POST['minuto'], $_POST['segundo'])) {
        $hora = $_POST['hora'];
        $minuto = $_POST['minuto'];
        $segundo = $_POST['segundo'];
        $horaCadena = strtotime("$hora:$minuto:$segundo");

        // Formato seleccionado
        $formatoHora = $_POST['formatoHora'];
        $horaFormateada = date($formatoHora, $horaCadena);
        echo "Hora formateada: $horaFormateada<br>";
    }
    ?>
</body>
</html>