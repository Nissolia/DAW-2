<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    $numeros = [
        [5, 6, 2],
        [4, 7, 1, 6, 3],
        [5, 9],
        [4, 6, 2, 5, 3]
    ];
    // version con dos bucles for normales
    //el array "superior" el cual usamos para ver los primeros bloques
    for ($i = 0; $i < count($numeros); $i++) {
        //el array de dentro que usaremos para ver cuantos valores tendremos
        for ($j = 0; $j < count($numeros[$i]); $j++) {
            echo $numeros[$i][$j] . ", ";
        }
    }
    // version con un foreach y un bucle for normal
    foreach ($numeros as $fila) {
        //el array de dentro que usaremos para ver cuantos valores tendremos
        for ($j = 0; $j < count($fila); $j++) {
            echo $fila[$j] . ", ";
        }
    }
    foreach ($numeros as $fila) {
        //el array de dentro que usaremos para ver cuantos valores tendremos
        foreach ($fila as $valor) {
            echo $valor . ", ";
        }
    }
    //siguiente, se hace con las notas

    $alumnos = [
        'pepe' => [5, 4, 3, 2, 5, 7],
        'ana' => [4, 3, 2, 7, 6],
        'jorge' => [3, 4, 6, 2, 3]
    ];
// bucle foreach y uno normal
    foreach ($alumnos as $nombre => $notas) {
        echo $nombre . " : ";
        for ($i = 0; $i < count($notas); $i++) {
            echo $notas[$i].", ";
        }
        echo ">br>";
    }
    //con dos bucles foreach
    foreach ($alumnos as $nombre => $notas) {
        echo $nombre . " : ";
        foreach ($notas as $nota) {
            echo $nota.", ";
        }
        echo ">br>";
    }
    
    ?>
</body>

</html>