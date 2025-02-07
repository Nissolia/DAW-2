<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej.Cubo</title>
</head>

<body>
    <?php
    include_once 'Cubo.php';
    $cubo1 = new Cubo(20, 5);
    $cubo2 = new Cubo(10, 1);
    $cubo3 = new Cubo(13, 2);
    $cubo4 = new Cubo(5, 0);
    echo "$cubo1$cubo2$cubo3$cubo4";
    echo    $cubo1->verterUnoOtro($cubo2, 1);
    echo "$cubo1$cubo2";
    echo   $cubo2->verterUnoOtro($cubo1, 30);
    echo "$cubo1$cubo2";

    ?>
</body>

</html>