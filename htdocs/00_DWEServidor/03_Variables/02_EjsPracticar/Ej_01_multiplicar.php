<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $num1 = $_REQUEST['N1'];
    $num2 = $_REQUEST['N2'];

    echo "La multiplicacion de $num1 y $num2 es " . $num1 + $num2;
    ?>
</body>

</html>