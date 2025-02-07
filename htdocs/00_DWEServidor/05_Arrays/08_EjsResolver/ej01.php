<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Diseñar una página que esté compuesta por una tabla de 10 filas
     por 10 columnas, y en cada celda habrá una imagen de un ojo cerrado.
     Cada vez que el usuario pulse un ojo, se recargará la página
     con todos los ojos cerrados salvo los que se han ido pulsando que corresponderá a un
     ojo abierto. Conforme se vayan pulsando más ojos se irá completando la tabla de ojos
     abiertos. Si se pulsa en un ojo abierto se volverá a cerrar. -->


    <!-- IMPORTANTE: se debe usar implode y explode para las cadenas,
 uno de los arrays tiene el estado de los ojos y este te ayuda a comprobar
 el estado de los que hace click el usuario, el array dentro tiene 0 o 1, 0
 es false y 1 es true, es importante esta parte -->

    <h1>Pulsa un ojo para abrirlo</h1>
    <h3>Si está abierto se cierra</h3>
    <table class="table">
<?php 
if (isset($_REQUEST['seleccion'])) {
    $seleccion = $_REQUEST['seleccion']; // Corregido: variable era $seleccion, no $sol
    $ojos = explode(",", $_REQUEST['ojos']);
    $ojos[$seleccion] = ($ojos[$seleccion] == 0) ? 1 : 0;
} else {
    // Con esto se rellena de una vez todo y no hay que hacer un array ni nada
    $ojos = array_fill(0, 100, 0);
}
$cadena = implode(',', $ojos);
$n = 0;
for ($i = 0; $i < 10; $i++) { 
    echo "<tr class='td'>";
    for ($j = 0; $j < 10; $j++) { 
        echo "<td class='td'>";
        echo "<a href='ej01.php?seleccion=$n&ojos=$cadena'>";
        echo "<img src='img/ojo_" . (($ojos[$n] == 1) ? 'abierto' : 'cerrado') . ".png' alt='Ojo' style='width: 50px;>"; 
        echo "</a>";
        $n++;
        echo "</td>";
    }
    echo "</tr>";
}
?>
    </table>
</body>

</html>
