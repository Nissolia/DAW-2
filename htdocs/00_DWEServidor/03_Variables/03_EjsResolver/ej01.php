<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculo del volúmen de un cilindro</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .imagen {
            width: 20%;
            height: auto;
            margin: 2em;
        }
    </style>
</head>

<body>
    <!-- Una vez el usuario introduzca los
datos y pulse el botón calcular, deberá calcularse el volumen del
cilindro y mostrarse el resultado en el navegador
 Mostrar la imagen de un cilindro junto al resultado y un título
 "Calculo del volúmen de un cilindro",
intenta dar un aspecto agradable a la página de resultado. -->
    <h1>Calculo del volúmen de un cilindro</h1>
    <div class="extCirculo">
        <img class="imagen" src="ej01/cilindro.png" alt="">
    </div>

    <?php
    $diametro = $_REQUEST['diametro'];
    $alt = $_REQUEST['altura'];
    $ra = $diametro / 2;

    $vol = 3.14 * pow($ra, 2) * $alt;
    echo $vol;
    ?>
</body>

</html>