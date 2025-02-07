<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $peliculas = ['Batman', 'Spiderman', 'Las vegas'];
    $cantantes = ['Max', 'Sloan', 'Loco'];

    // for clasico para hacerlo
    echo "<h2>Películas</h2>";
    echo "<ul>";
    for ($i = 0; $i < count($peliculas); $i++) {
        echo "<li>" . $peliculas[$i] . "</li>";
    }
    echo "</ul>";

    //con foreach se crea de cada uno de los que exista
    echo "<h2>Cantantes</h2>";
    echo "<ul>";
    foreach ($cantantes as $cantante) {
        echo "<li>" . $cantante . "</li>";
    }
    echo "</ul>";
    //////////////// ARRAY ASOCIATIVO
    $personas = array(
        'nombre' => 'Ana',
        'apellidos' => 'Maria',
        'web' => 'google.es'
    );
    // var_dump($personas);
    echo $personas['apellidos'];
    echo '<br>';
    // por link se puede enviar informacion de get como array asociativo
    // ?hola=1&nombre=paco

    //multidimensionales

    $contactos = array(
        array(
            'nombre' => 'antonio',
            'correo' => 'antonio@correo.com'
        ),
        array(
            'nombre' => 'paco',
            'correo' => 'paco@correo.com'
        ),
        array(
            'nombre' => 'pepa',
            'correo' => 'pepa@correo.com'
        ),
    );

    //acceder a paco
    echo $contactos[1]['nombre'];
    echo '<br>';
    echo $contactos[2]['correo'];
    echo '<br>';
    foreach ($contactos as $key => $contacto) {
       echo "Nombre de contacto: ". $contacto['nombre'];
       echo '<br>';
       echo "Correo de contacto: ". $contacto['correo'];
       echo '<br>';
    }
    ?>


</body>

</html>