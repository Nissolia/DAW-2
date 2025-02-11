<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post">

    Numero de cartas:
    <input type="number" placeholder="Introduce el número de cartas que quieres obtener" name="cantidad">
    <br><br><input type="submit" value="obtener" name="enviar"><br><br>

</form>

<?php
    if(isset($_POST['cantidad'])){
        $url="http://localhost//Curso%20Actual/Ejer-LIBRO/Unidad%2012/Ejercicios%2012.6/2/servidor.php";
        $parametros="?c=".$_POST['cantidad'];
        $conversion = @file_get_contents($url.$parametros);
        $respuesta = json_decode($conversion);
        echo "<hr>Cabecera: ".$http_response_header[0]."<br>";
        if ($http_response_header[0]=="HTTP/1.1 200 OK") {
            foreach ($respuesta as $carta) {
                echo $carta.'<br>';
            }
        }else {
            // echo "Código de error: $respuesta->error <br> Información: $respuesta->errorMsg";
            echo 'Error número: ' . substr($http_response_header[0],9,3);
            echo '<br>Descripción: ' . substr($http_response_header[0],12);
        }
        
    }
?>
</body>
</html>