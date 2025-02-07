<?php
include_once 'info.php';
?>
<!DOCTYPE html>
<html lang="en">
<!--  -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiempo con Openweathermap</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Utilizando la API de OpenWeatherMap, realiza una aplicación que muestre la información meteorológica
(investiga los distintos parámetros que puede informar la API) de una determinada ciudad. Para la selección de la
ciudad se puede utilizar la imagen de un mapa, una o varias listas desplegables, un campo de texto o combinaciones
de los métodos anteriores, de manera que tengamos una aplicación interact -->

    <h2><?= $tituloPag ?>
    </h2>
    <form action="" method="post">
Ciudad: <input type="text" name="ciudad">
        <!-- <select name="ciudad">
            <?php
            // foreach ($ciudades as $ciudad) {
                // echo "<option value=\"$ciudad\">$ciudad</option>";
            // }
            ?>
        </select> -->
        <div>
        <input type="checkbox" name="humedad"> Humedad</div>
        <div><input type="checkbox" name="nivelMar">Nivel del mar</div>
        <div><input type="checkbox" name="presion">Presión</div>
        <div><input type="checkbox" name="viento">Viento</div>
        <div><input type="checkbox" name="nubes">Nubes</div>


        <input class="boton" type="submit" value="Ver tiempo">
    </form>
    <div class="resultado"> <p><?= $imprimir ?></p></div>
   
    <?php



    // echo "<h3>Datos en bruto (en formato JSON): </h3>$datos<hr>";
    // $tiempo = json_decode($datos);
    // echo "<h3>Datos en un objeto: </h3>";
    // print_r($tiempo);
    // echo "<hr>";
    // echo "<h3>Datos sueltos: </h3>";
    // echo "Temperatura: " . $tiempo->main->temp . "ºC<br>";
    // echo "Humedad: " . $tiempo->main->humidity . "%<br>";
    // echo "Presión: " . $tiempo->main->pressure . "mb<br>";
    ?>

    
</body>

</html>