<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear coche</title>
</head>

<body>
    <?php

    if (isset($_REQUEST['marca']) && isset($_REQUEST['tipo'])) {
        $marca = $_REQUEST['marca'];
        $tipo = $_REQUEST['tipo'];
        //    extraemos las ultimas tres palabras en mayusculas para el codigo final
        $codigo =  substr(strtoupper($marca), -1, -3);
        $rand = rand(100, 999);
        $codFin = $codigo . "-" . $rand;
        // Para la fecha
        $fecha = date("d/m/Y");
        // día de la semana devuelve un entero de la fecha
        $diaSemana = date("w", strtotime($fecha));
        $diasEnEspanol = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];

        // ahora creamos el array correspondiente
        $_SESSION['catalogo'][] =  [
            $codFin => [
                'fecha' =>  $diasEnEspanol[$diaSemana] . " - " . "strtotime($fecha)",
                'marca' => $marca,
                'tipo' => $tipo,
                // para poder añadir o no los extras necesarios
               [(isset($_REQUEST['exCamaratra'])) ? $_REQUEST['exCamaratra'] : null,
                    (isset($_REQUEST['exAleacion'])) ? $_REQUEST['exAleacion'] : null,
                    (isset($_REQUEST['exClimatizador'])) ? $_REQUEST['exClimatizador'] : null,
                ],
            ]
        ];
    }
    header('Location:index.php');
    ?>

</body>

</html>