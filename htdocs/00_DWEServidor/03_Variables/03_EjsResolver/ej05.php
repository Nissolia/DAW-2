<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cilindro calculado</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- Diseñar un desarrollo web simple con PHP que dé respuesta a la necesidad
 que se plantea a continuación: Un operario de una fábrica recibe cada
 cierto tiempo un depósito cilíndrico de dimensiones variables, que debe
llenar de aceite a través de una toma con cierto caudal disponible.

Se desea crear una aplicación web que le indique cuánto tiempo
transcurrirá hasta el llenado del depósito. Para calcular dicho tiempo
el usuario introducirá los siguientes datos: diámetro y altura del
cilindro y caudal de aceite (litros por minuto). Una vez
introducidos se mostrará el tiempo total en horas y minutos que
se tardará en llenar el cilindro. -->
    <h1>Calculo de cilindro</h1>
    <?php
    $dia = $_REQUEST['diametro']; // Diámetro
    $alt = $_REQUEST['altura']; // Altura
    $cau = $_REQUEST['caudal']; // Caudal

    // Calcular el volumen del cilindro en litros
    $radio = $dia / 2;
    // area=pi*radio,2(pow), round 3
    // volumen= area * altura
    $altMetros = $alt / 100; 
    $volumen = pi() * pow($radio, 2) * $altMetros; 
    $volMetros = $volumen * 1000;
    // Calcular el tiempo necesario para llenar el cilindro
    $tiempo_minutos = $volMetros / $cau; 
    $horas = floor($tiempo_minutos / 60); 
    $minutos = $tiempo_minutos % 60; 
    ?>
    <div>
        <div class='result'>
            
            <p><b>Volumen del cilindro:</b> <?= number_format($volMetros, 2) ?> litros.</p>
            <p><b>Tiempo para llenar el cilindro:</b> <?= $horas ?> horas y <?= $minutos ?> minutos.</p>
        </div>

    </div>

</body>

</html>