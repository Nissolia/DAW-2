<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej 3</title>
</head>

<body>
    <!-- Ejercicio 3 -->
    <h2>Ejercicio 3: Día de la semana</h2>
    <form action="" method="post">
        Fecha: <input type="date" name="fechaDia" required>
        <input type="submit" value="Enviar">
    </form>

    <?php
    if (isset($_POST['fechaDia'])) {
        $fecha = $_POST['fechaDia'];
        // día de la semana devuelve un entero de la fecha
        $diaSemana = date("w", strtotime($fecha)); 
        $diasEnEspanol = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
        echo "El día de la semana es: " . $diasEnEspanol[$diaSemana] . "<br>";
    }
    ?>
</body>

</html>