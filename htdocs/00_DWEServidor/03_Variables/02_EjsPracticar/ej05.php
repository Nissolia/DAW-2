<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    El area del rectangulo es :
    <?php 
    $alt = $_POST['alt'];
    $anc= $_POST['anc'];

    echo $alt*$anc;
    ?>
</body>
</html>