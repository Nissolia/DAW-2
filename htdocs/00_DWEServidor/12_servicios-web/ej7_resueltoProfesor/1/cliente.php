<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST">
        Moneda original :
        <select name="moneda">
            <option value="eur">Euro</option>
            <option value="pes">Peseta</option>
        </select><br>

        Inserte cantidad: <input type="number" name="cantidad">
        <input type="submit">
    </form>
    <hr>
    <?php
    if (isset($_POST['cantidad'])) {
        $url="http://localhost//Curso%20Actual/Ejer-LIBRO/Unidad%2012/Ejercicios%2012.6/1/servidor.php";
        $parametros="?cantidad=$_POST[cantidad]&moneda=$_POST[moneda]";
        $respuesta = @file_get_contents($url.$parametros);
        $conversion = json_decode($respuesta);
        
        if ($http_response_header[0]=="HTTP/1.1 200 OK") {
            echo "$conversion->cantidad_inicial $conversion->moneda_inicial ";
            echo "son " . round($conversion->resultado, 2) . " $conversion->moneda";
        } else {
            // echo 'Error número: ' . $conversion->codigo;
            // echo '<br>Descripción: ' . $conversion->mensaje;
            echo 'Error número: ' . substr($http_response_header[0],9,3);
            echo '<br>Descripción: ' . substr($http_response_header[0],13);
            echo "<hr>Cabecera: ".$http_response_header[0];
        }
        //Las siguientes lineas muestran el resultado de la función json_decode, según el valor u omisión del segundo parámetro booleano
        // echo "<hr>";
        // print_r($conversion);
        // echo "<br>sin nada<br>";
        // $conversion = json_decode($json, true);
        // print_r($conversion);
        // echo "<br>con true<br>";
        // $conversion = json_decode($json, false);
        // print_r($conversion);
        // echo "<br>con false<br>";
    }
    ?>
</body>

</html>