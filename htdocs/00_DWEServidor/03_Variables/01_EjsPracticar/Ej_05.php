<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>

<body>
    <h2>
        <?php
        $x = 144;
        $y = 999;
        ?>
        <h1>Variables: </h1>
        <?php
        echo "x: " . $x . ", y: " . $y;
        ?>
        <h2>Suma:</h2>
        <?php
        echo $x . " + " . $y . " = " . $x + $y;
        ?>
        <h2>Resta:</h2>
        <?php
        echo $x . " + " . $y . " = " . $x - $y
        ?>
        <h2>División: </h2>
        <?php
        echo $x . " + " . $y . " = " . $x / $y;
        ?>
        <h2>Multiplicación:</h2>
        <?php
        echo $x . " + " . $y . " = " . $x * $y;
        ?>
    </h2>
</body>

</html>