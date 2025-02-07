<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Según tus horas trabajadas cobrarás:
    <?php 
    $sal = $_REQUEST['sal'];
    $xhora = 12;
    echo $sal*$xhora;
    ?>
</body>
</html>