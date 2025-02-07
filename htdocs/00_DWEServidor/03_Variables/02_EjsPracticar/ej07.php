<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $base = $_POST['base'];
    $iva = $base * 0.21;
    $irpf = $base * 0.15;
    $total = $irpf + $iva + $base;
    ?>
    Base imponible: <?= $base ?> <br>
    IVA 21%: <?= $iva ?><br>
    IRPF 15%: <?= $irpf ?><br>
    <h3><b>Precio total:</b> <?= $total ?> </h3> 
</body>

</html>