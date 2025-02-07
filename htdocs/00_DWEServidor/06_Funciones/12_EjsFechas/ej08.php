<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ej 8</title>
</head>

<body>
    <!-- Ejercicio 8 -->
    <h2>Ejercicio 8: Comparar edades de dos personas</h2>
    <form action="" method="post">
        Nombre de la primera persona: <input type="text" name="nombre1" required><br>
        Fecha de nacimiento de la primera persona: <input type="date" name="nacimiento1" required><br>
        Nombre de la segunda persona: <input type="text" name="nombre2" required><br>
        Fecha de nacimiento de la segunda persona: <input type="date" name="nacimiento2" required><br>
        <input type="submit" value="Enviar">
    </form>

    <?php
    if (isset($_POST['nombre1'], $_POST['nacimiento1'], $_POST['nombre2'], $_POST['nacimiento2'])) {
        $nombre1 = $_POST['nombre1'];
        $nacimiento1 = strtotime($_POST['nacimiento1']);
        $nombre2 = $_POST['nombre2'];
        $nacimiento2 = strtotime($_POST['nacimiento2']);

        $edad1 = floor((time() - $nacimiento1) / (60 * 60 * 24 * 365.25));
        $edad2 = floor((time() - $nacimiento2) / (60 * 60 * 24 * 365.25));

        echo "$nombre1 tiene $edad1 años.<br>";
        echo "$nombre2 tiene $edad2 años.<br>";

        if ($edad1 > $edad2) {
            echo "$nombre1 es mayor que $nombre2.<br>";
        } elseif ($edad1 < $edad2) {
            echo "$nombre2 es mayor que $nombre1.<br>";
        } else {
            echo "Ambos tienen la misma edad.<br>";
        }
    }
    ?>
</body>

</html>