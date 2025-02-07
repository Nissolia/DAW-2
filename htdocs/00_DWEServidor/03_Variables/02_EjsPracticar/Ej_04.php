<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3>Numeros introducidos: </h3>
    <?php
    $n1 = $_POST['n1'];
    $n2 = $_POST['n2'];
    echo "$n1 y $n2";
    ?>
    <h3>Suma</h3>
    <?php
    echo $n1 + $n2; ?>
    <h3>Resta</h3>
    <?php
    echo $n1 - $n2; ?>
    <h3>Multiplicación</h3>
    <?php
    echo $n1 * $n2; ?>
    <h3>División</h3>
    <?php
    echo $n1 / $n2; ?>
</body>

</html>