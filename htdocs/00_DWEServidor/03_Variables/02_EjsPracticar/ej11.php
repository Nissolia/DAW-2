<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $num = $_REQUEST['num'];
    $kbmb = 0.001;
    $conver = $num * $kbmb;
    ?>
    <h1>Convertido</h1>
    <p><?= $num ?> kilobytes son <?= $conver ?> megabytes.</p>
</body>

</html>