<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recibe cambiado</title>
</head>

<body>
    <?php
    if (!isset($_REQUEST['numeros'])) { //priemra vez
    ?>
        <a href="ej2_cambiado.php">Volver a la página anterior.</a>

    <?php
    } else {
        $numeros = $_REQUEST['numeros'];
        foreach ($numeros as $n) {
            echo $n . " ";
        }
    }
    ?>
</body>

</html>