<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio ?</title>
</head>

<body>
    <p>
        <?php
        ////////////////////////////////// ejercicio 1
        if (isset($_REQUEST['string'])) {
            $string = $_REQUEST['string'];
            for ($i = 0; $i < strlen($string); $i++) {
                echo $string[$i] . "<br>";
            }
        }
        ////////////////////////////////// ejercicio 2
        if (isset($_REQUEST['vocal'])) {

            $frase =  strtolower($_REQUEST['frase']);
            $vocal = $_REQUEST['vocal'];

            $vocales = ['a', 'e', 'i', 'o', 'u'];
            if (!in_array($vocal, $vocales)) {
                echo "<p> Debe introducir una vocal.</p>";
            } else {
                echo str_replace($vocales, $vocal, $frase);
            }

            // for ($i = 0; $i < strlen($frase); $i++) {
            //     if ($frase[$i] == 'a' || $frase[$i] == 'e' || $frase[$i] == 'i' || $frase[$i] == 'o' || $frase[$i] == 'u') {
            //         $frase[$i] = $vocal;
            //     } }
            echo $frase;
        }
        ////////////////////////////////// ejercicio 3
        if (isset($_REQUEST['espacios'])) {
            $espacios = $_REQUEST['espacios'];
            $palabras = 0;

            do {
                $palabras++;
                // strstr te busca el primer espacio y te va quitando palabras
                $espacios = trim(strstr($frase, " "));
            } while ($espacios != "");
            echo "La frase tiene $palabras palabras";

            // $sinEspacios = trim($espacios);
            // echo $espacios;
            // echo "Hay " . strlen($sinEspacios) . " caracteres sin contar los espacios.";
        }
        ////////////////////////////////// ejercicio 4
        if (isset($_REQUEST['capicuo'])) {
            $frase = trim($_REQUEST['capicuo']);

            $primera = substr($frase, 0, strpos($frase, " "));
            $ultima = substr($frase, strrpos($frase, " ") + 1);

            //     $capicuo = $_REQUEST['capicuo'];
            //     $volteado = strrev($capicuo);
            //     if ($volteado == $capicuo) {
            //         echo "Empiezan y acaban igual";
            //     } else {
            //         echo "No empiezan y acaban igual";
            //     }
        }
        ////////////////////////////////// ejercicio 5
        if (isset($_REQUEST['intercambio'])) {
            $intercambio = $_REQUEST['intercambio'];
            $inicio = $intercambio;
            do {
                $aux = substr($intercambio, 2);
                $intercambio = $intercambio[strlen($intercambio) - 1] . $aux;
            } while ($intercambio == $inicio);
        }
        ////////////////////////////////// ejercicio 6
        // mejorado 
        if (isset($_REQUEST['caracteresPunto'])) {
            $caPunto = $_REQUEST['caracteresPunto'];
            $punto = mb_stripos($caPunto, ".");
            $parte1 = substr($caPunto, 1, ($punto));
            $parte2 = substr($caPunto, ($punto + 1));
            echo "La primera frase tiene " . strlen($parte1);
            echo "La segunda frase tiene " . strlen($parte2);
        }
        ////////////////////////////////// Ejercicio 7
        // la palabra la envia tambien el usuario
        if (isset($_REQUEST['palabraFrase'])) {
            $frase = $_REQUEST['palabraFrase'];
            $letra = "arroz";
            if (strpos($frase, $letra)) {
                echo "Has añadido la palabra: " . $letra;
            } else {
                echo "No has añadido la palabra: " . $letra;
            }
        }
        ////////////////////////////////// Ejercicio 8
        if (isset($_REQUEST['stringAscii'])) {
            $stringAscii = $_REQUEST['stringAscii'];
            $asciiCodes = '';

            // Convertir a códigos ASCII
            for ($i = 0; $i < strlen($stringAscii); $i++) {
                $asciiCodes .= ord($stringAscii[$i]);
            }
            echo "Códigos ASCII concatenados: $asciiCodes";

            // Convertir de vuelta a texto
            $decodedString = '';
            for ($i = 0; $i < strlen($asciiCodes); $i += 3) {
                $decodedString .= chr((int)substr($asciiCodes, $i, 3));
            }
            echo "<br>Texto decodificado: $decodedString";
            ////////////////////////////////// Ejercicio 9
            if (isset($_REQUEST['cadenaInvertida'])) {
                $cadenaInvertida = $_REQUEST['cadenaInvertida'];
                echo "Cadena invertida: " . strrev($cadenaInvertida);
            }
            ////////////////////////////////// Ejercicio 10
            if (isset($_REQUEST['nombreCompleto'])) {
                $nombreCompleto = $_REQUEST['nombreCompleto'];

                // Convertir la primera letra de cada palabra en mayúscula
                $nombreCapitalizado = ucwords(strtolower($nombreCompleto));

                // Obtener iniciales
                $palabras = explode(" ", $nombreCompleto);
                $iniciales = '';
                foreach ($palabras as $palabra) {
                    if (!empty($palabra)) {
                        $iniciales .= strtoupper($palabra[0]);
                    }
                }

                echo "Nombre capitalizado: $nombreCapitalizado <br>";
                echo "Iniciales: $iniciales";
            }
            ////////////////////////////////// Ejercicio 11
            if (isset($_REQUEST['numeroRomano'])) {
                $numeroRomano = $_REQUEST['numeroRomano'];
                $valoresRomanos = [
                    'M' => 1000,
                    'D' => 500,
                    'C' => 100,
                    'L' => 50,
                    'X' => 10,
                    'I' => 1,
                ];
                $valorDecimal = 0;
                $entradaValida = true;

                for ($i = 0; $i < strlen($numeroRomano); $i++) {
                    $caracter = $numeroRomano[$i];
                    if (isset($valoresRomanos[$caracter])) {
                        $valorDecimal += $valoresRomanos[$caracter];
                    } else {
                        $entradaValida = false;
                        break;
                    }
                }

                if ($entradaValida) {
                    echo "El valor decimal de $numeroRomano es: $valorDecimal";
                } else {
                    echo "Entrada errónea. Solo se permiten los caracteres: M, D, C, L, X, I.";
                }
            }

            ////////////////////////////////// Ejercicio 12
            // hay que hacerlo con explode y ya con eso puedes hacer las comprobaciones
            if (isset($_REQUEST['telegrama'])) {
                $telegrama = trim($_REQUEST['telegrama'], '.');
                $palabras = preg_split('/\s+/', $telegrama);
                $cantidadPalabrasLargas = 0;
                $vocalesCount = ['a' => 0, 'e' => 0, 'i' => 0, 'o' => 0, 'u' => 0];
                $espacios = substr_count($telegrama, ' ');
                $totalCaracteres = strlen($telegrama);
                $totalPalabras = count($palabras);

                foreach ($palabras as $palabra) {
                    if (strlen($palabra) > 10) {
                        $cantidadPalabrasLargas++;
                    }
                    $vocalesCount['a'] += substr_count(strtolower($palabra), 'a');
                    $vocalesCount['e'] += substr_count(strtolower($palabra), 'e');
                    $vocalesCount['i'] += substr_count(strtolower($palabra), 'i');
                    $vocalesCount['o'] += substr_count(strtolower($palabra), 'o');
                    $vocalesCount['u'] += substr_count(strtolower($palabra), 'u');
                }

                $porcentajeEspacios = ($espacios / $totalCaracteres) * 100;

                echo "Cantidad de palabras con más de 10 letras: $cantidadPalabrasLargas<br>";
                foreach ($vocalesCount as $vocal => $cantidad) {
                    echo "Cantidad de '$vocal': $cantidad<br>";
                }
                echo "Porcentaje de espacios en blanco: " . round($porcentajeEspacios, 2) . "%<br>";
            }

            ////////////////////////////////// Ejercicio 13
            if (isset($_REQUEST['textoFinal'])) {
                $textoFinal = trim($_REQUEST['textoFinal'], '.');
                $palabras = preg_split('/\s+/', $textoFinal);
                $palabraMasLarga = '';
                $posicionInicial = -1;
                $longitudPalabra = 0;
                $cantidadPalabrasConA = 0;

                foreach ($palabras as $indice => $palabra) {
                    if (strlen($palabra) > strlen($palabraMasLarga)) {
                        $palabraMasLarga = $palabra;
                        $posicionInicial = strpos($textoFinal, $palabra);
                        $longitudPalabra = strlen($palabra);
                    }

                    if (strlen($palabra) >= 8 && strlen($palabra) <= 16) {
                        $cantidadPalabrasConA += substr_count(strtolower($palabra), 'a');
                    }
                }

                echo "La palabra más larga es: '$palabraMasLarga' en la posición $posicionInicial con longitud $longitudPalabra<br>";
                echo "Cantidad de palabras con longitud entre 8 y 16 que contienen más de tres veces la vocal 'a': $cantidadPalabrasConA<br>";
            }
        } else {
            header("Location: ej00_indice.php");
        }

        ?>
        <br>
        <a href="ej00_indice.php">Volver a los formularios</a>
    </p>
</body>

</html>