<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Aspirantes</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Estilo para los aspirantes mayores de 30 */
        .mayor {
            color: red;
        }
    </style>
</head>

<body>
    <h1>Listado de Aspirantes</h1>

    <?php
    // Verificar si se han pasado los aspirantes
    if (isset($_POST['aspirantesCodificado'])) {
        $aspirantes = unserialize(base64_decode($_POST['aspirantesCodificado']));

        if (!empty($aspirantes)) {
            echo "<table class=table>";
            echo "<tr><th class='td'>Nombre</th><th class='td' >Edad</th><th class='td' >Experiencia</th><th class='td' >Correo</th></tr>";

            // Recorrer y mostrar los aspirantes
            foreach ($aspirantes as $nombre => $datos) {
                $clase = ($datos['edad'] > 30) ? 'mayor' : ''; // Si el aspirante es mayor de 30, aplicamos la clase 'mayor'
                echo "<tr class='$clase'>";
                echo "<td class='td' >$nombre</td>";
                echo "<td class='td' >{$datos['edad']}</td>";
                echo "<td class='td' >{$datos['experiencia']} años</td>";
                echo "<td class='td' >{$datos['correo']}</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "<p>No hay aspirantes en la lista.</p>";
        }
    } else {
        // Si se intenta acceder sin datos
        echo "<p>Primero debes introducir los aspirantes.</p>";
        echo "<a href='ej05-main.php'>Volver a la página de aspirantes</a>";
    }
    ?>

</body>

</html>
