<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generar Parejas</title>
</head>

<body>
    <h1>Generar parejas aleatorias</h1>

    <?php
    if (isset($_POST['personasCodificadas'])) {
        // Deserializar la cadena y asegurarse de que sea un array
        $personas = @unserialize(base64_decode($_POST['personasCodificadas']));
        if (!is_array($personas)) {
            echo "<p>Error al cargar los datos de las personas.</p>";
            exit; // Detener la ejecución si no se pudo cargar el array
        }

        // Botones para seleccionar tipo de pareja
        echo "<form action='ej04-generarPareja.php' method='post'>";
        echo "<input type='hidden' name='personasCodificadas' value='" . base64_encode(serialize($personas)) . "'>";
        echo "<input type='submit' name='pareja' value='Heterosexual'><br>";
        echo "<input type='submit' name='pareja' value='Homosexual'><br>";
        echo "<input type='submit' name='pareja' value='Bisexual'><br>";
        echo "</form>";

        // Procesar la selección de pareja
        if (isset($_POST['pareja'])) {
            $tipoPareja = strtolower($_POST['pareja']);
            $primeraPersona = null;
            $segundaPersona = null;

            while (true) {
                if ($tipoPareja == 'heterosexual') {
                    // Buscar primera persona heterosexual de cualquier sexo
                    $hetero = array_filter($personas, function ($p) {
                        return $p['orientacion'] == 'het';
                    });

                    if (count($hetero) > 0) {
                        $primeraPersona = $hetero[array_rand($hetero)];

                        // Buscar segunda persona del sexo opuesto, heterosexual o bisexual
                        $sexoOpuesto = ($primeraPersona['sexo'] == 'h') ? 'm' : 'h';
                        $compatibles = array_filter($personas, function ($p) use ($sexoOpuesto) {
                            return $p['sexo'] == $sexoOpuesto && ($p['orientacion'] == 'het' || $p['orientacion'] == 'bis');
                        });

                        if (count($compatibles) > 0) {
                            $segundaPersona = $compatibles[array_rand($compatibles)];
                            break; // Salir del bucle si se encontró una pareja compatible
                        }
                    }
                } elseif ($tipoPareja == 'homosexual') {
                    // Buscar primera persona homosexual
                    $homos = array_filter($personas, function ($p) {
                        return $p['orientacion'] == 'hom';
                    });

                    if (count($homos) > 0) {
                        $primeraPersona = $homos[array_rand($homos)];

                        // Buscar segunda persona del mismo sexo y orientación homosexual
                        $compatibles = array_filter($personas, function ($p) use ($primeraPersona) {
                            return $p['sexo'] == $primeraPersona['sexo'] && $p['orientacion'] == 'hom';
                        });

                        if (count($compatibles) > 0) {
                            $segundaPersona = $compatibles[array_rand($compatibles)];
                            break; // Salir del bucle si se encontró una pareja compatible
                        }
                    }
                } elseif ($tipoPareja == 'bisexual') {
                    // Buscar primera persona bisexual
                    $bisexuales = array_filter($personas, function ($p) {
                        return $p['orientacion'] == 'bis';
                    });

                    if (count($bisexuales) > 0) {
                        $primeraPersona = $bisexuales[array_rand($bisexuales)];

                        // Buscar segunda persona compatible (no homosexual de sexo contrario, ni heterosexual de mismo sexo)
                        $compatibles = array_filter($personas, function ($p) use ($primeraPersona) {
                            return !($p['orientacion'] == 'hom' && $p['sexo'] != $primeraPersona['sexo']) &&
                                !($p['orientacion'] == 'het' && $p['sexo'] == $primeraPersona['sexo']);
                        });

                        if (count($compatibles) > 0) {
                            $segundaPersona = $compatibles[array_rand($compatibles)];
                            break; // Salir del bucle si se encontró una pareja compatible
                        }
                    }
                }
            }

            // Mostrar los resultados de la pareja
            echo "<h2>Pareja {$tipoPareja}</h2>";
            echo "<p>{$primeraPersona['nombre']} ({$primeraPersona['sexo']}, {$primeraPersona['orientacion']}) y {$segundaPersona['nombre']} ({$segundaPersona['sexo']}, {$segundaPersona['orientacion']})</p>";
        }
    } else {
        echo "<p>No hay personas registradas.</p>";
    }
    ?>
</body>

</html>
