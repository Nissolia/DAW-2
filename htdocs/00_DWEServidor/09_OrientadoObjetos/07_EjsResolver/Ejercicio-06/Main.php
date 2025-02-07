<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio vehículos</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<?php

include_once 'Bicicleta.php';
include_once 'Coche.php';

$miBicicleta = new Bicicleta();
$miCoche = new Coche("Yundai", 88);

// Realizar acciones con la bicicleta
$miBicicleta->andar(20);
echo $miBicicleta->hacerCaballito() . "<br><br>";

// Realizar acciones con el coche
$miCoche->andar(100);
echo $miCoche->quemarRueda() . "<br><br>";

// Ver Km individual
echo "Km de la bicicleta: " . $miBicicleta->getKmRecorridos() . " km.<br>";
echo "Km del coche: " . $miCoche->getKmRecorridos() . " km.<br><br>";

// Ver Km total
echo "Km total de todos los vehículos: " . Vehiculo::getKmTotales() . " km.<br>";

// Ver número de vehículos creados
echo "Número de vehículos creados: " . Vehiculo::getVehiculosCreados() . "<br><br>";

?>


</body>

</html>