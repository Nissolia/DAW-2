<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Prueba de clase Persona</title>
</head>

<body>
    <?php
    include_once 'Persona.php';
    $unTipo = new Persona("Pepe Pérez", "albañil", 30);
    $unNota = new Persona("Rigoberto Peláez", "programador", 40);
    echo $unTipo;
    echo $unNota;
    ?>
</body>



</html>