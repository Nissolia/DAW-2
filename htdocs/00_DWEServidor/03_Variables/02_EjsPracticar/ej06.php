<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
El area del triángulo es: 
    <?php 
    $alt = $_POST['alt'];
    $base= $_POST['base'];

    echo ($alt*$base)/2;
    ?>
</body>
</html>