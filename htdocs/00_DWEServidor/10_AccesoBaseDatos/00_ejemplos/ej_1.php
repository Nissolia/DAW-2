<!DOCTYPE html>
<html lang="es">
<!-- importante -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ej_1</title>
</head>

<body>
    <?php
    try {
        $bd ="test";

        // $conexion = new PDO("mysql:host=localhost;dbname=banco;charset=utf8", "root","root"); 
        $conexion = new PDO("mysql:host=localhost;dbname=".$bd.";charset=utf8", "root",  "");
        // tiene que existir la base de datos para que funcione
        echo "Se ha establecido una conexión con el servidor de bases de datos de ".$bd;
    } catch (PDOException $e) {
        echo "No se ha podido establecer conexión con el servidor de bases de
datos.<br>";
        die("Error: " . $e->getMessage());
    }
    ?>
</body>

</html>