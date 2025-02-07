<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- volumen =1/3*pi*rpow2*altura -->
    <?php
    $ra = $_REQUEST['radio'];
    $al = $_REQUEST['altura'];

    $vol = (1 / 3) * pi() * pow($ra, 2) * $al;
    ?>
    <h1>Volumen de cono</h1>
    <p><?= $vol ?></p>
</body>

</html>