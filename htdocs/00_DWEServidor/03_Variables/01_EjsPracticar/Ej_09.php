<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 9</title>
</head>

<body>
    <?php
    $base = 9;
    // Para redondear a un numero entero
    $altura = ceil($base / 2);
    for ($a = 0; $a < $altura; $a++) {       

        for ($c = 0; $c < (2 * $a + 1); $c++) {
            echo "*";
        }
        echo "<br>";
    }
    ?>
</body>

</html>
