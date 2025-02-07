<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 8</title>
</head>

<body>
    <?php
    $eurpes = 166.386;
    $peseur = 0.00601;
    ?>
    <!-- Solo tiene que multiplicarse por la cantidad que queramos -->
    <h2>300 Euros son: </h2>
    <?php
    echo 300 * $eurpes . " pesetas";
    ?>
    <h2> 30000 pesetas son: </h2>
    <?php
    echo 30000 * $peseur . " euros";
    ?>
</body>

</html>