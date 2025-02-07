<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E4) Generar Personas</title>
</head>

<body>

    <!-- Vamos a realizar una página para generar parejas aleatorias según su sexo y orientación sexual.
Para ello en una primera página pediremos de manera reiterada el nombre, sexo (h o m) y
orientación (heterosexual, homosexual o bisexual) de personas, que se irán almacenando en
un array. Se dispondrá además, de un botón para pasar a la segunda página que permite
generar las parejas aleatorias con las personas introducidas. Esta segunda página debe
contener tres botones para generar una pareja aleatoria de los siguientes tipos:
-Heterosexual: Obtendrá aleatoriamente una primera persona de cualquier sexo y orientación
heterosexual, que unirá con una segunda persona de distinto sexo que sea heterosexual o
bisexual.
-Homosexual: Obtendrá aleatoriamente una primera persona de cualquier sexo y orientación
homosexual, que unirá con otra persona del mismo sexo y orientación.
-Bisexual: Obtendrá aleatoriamente una primera persona de cualquier sexto y orientación
bisexual, que unirá con otra persona que sea compatible, el perfil incompatible sería
homosexual de distinto sexo o heterosexual del mismo sexo.
Nota: El array de personas puede tener la siguiente estructura: -->

       <h1>Registrar personas</h1>

    <form action="ej04-generarPersona.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required><br>

        <label for="sexo">Sexo:</label>
        <select name="sexo" id="sexo" required>
            <option value="h">Hombre</option>
            <option value="m">Mujer</option>
        </select><br>

        <label for="orientacion">Orientación:</label>
        <select name="orientacion" id="orientacion" required>
            <option value="het">Heterosexual</option>
            <option value="hom">Homosexual</option>
            <option value="bis">Bisexual</option>
        </select><br>

        <!-- Aquí codificamos el array de personas ya registradas -->
        <input type="hidden" name="personasCodificadas" value="<?php echo isset($_POST['personasCodificadas']) ? $_POST['personasCodificadas'] : ''; ?>">
        <input type="submit" value="Añadir persona">
    </form>

    <form action="ej04-generarPareja.php" method="post">
        <input type="hidden" name="personasCodificadas" value="<?php echo isset($_POST['personasCodificadas']) ? $_POST['personasCodificadas'] : ''; ?>">
        <input type="submit" value="Generar parejas aleatorias">
    </form>

    <?php
    // Array de personas predefinidas
    $personasPredefinidas = [
        ['nombre' => 'Anita', 'sexo' => 'm', 'orientacion' => 'bis'],
        ['nombre' => 'Lolita', 'sexo' => 'm', 'orientacion' => 'bis'],
        ['nombre' => 'Pepito', 'sexo' => 'h', 'orientacion' => 'bis'],
        ['nombre' => 'Juanito', 'sexo' => 'h', 'orientacion' => 'bis'],
        ['nombre' => 'Roberto', 'sexo' => 'h', 'orientacion' => 'het'],
        ['nombre' => 'Antonio', 'sexo' => 'h', 'orientacion' => 'het'],
        ['nombre' => 'Manuela', 'sexo' => 'm', 'orientacion' => 'het'],
        ['nombre' => 'Isabel', 'sexo' => 'm', 'orientacion' => 'het'],
        ['nombre' => 'Jenifer', 'sexo' => 'm', 'orientacion' => 'hom'],
        ['nombre' => 'Susan', 'sexo' => 'm', 'orientacion' => 'hom'],
        ['nombre' => 'Peter', 'sexo' => 'h', 'orientacion' => 'hom'],
        ['nombre' => 'Mike', 'sexo' => 'h', 'orientacion' => 'hom']
    ];

    // Procesar el formulario de registro
    if (isset($_POST['nombre'])) {
        $persona = [
            'nombre' => $_POST['nombre'],
            'sexo' => $_POST['sexo'],
            'orientacion' => $_POST['orientacion']
        ];

        // Recuperar array existente o inicializar con las personas predefinidas
        if (isset($_POST['personasCodificadas']) && !empty($_POST['personasCodificadas'])) {
            $personas = unserialize(base64_decode($_POST['personasCodificadas']));
        } else {
            $personas = $personasPredefinidas; // Inicializar con las personas predefinidas
        }

        // Añadir la nueva persona
        $personas[] = $persona;

        // Codificar el array actualizado
        $personasCodificadas = base64_encode(serialize($personas));

        // Recargar la página con los datos actualizados
        echo "<form id='recargar' action='ej04-generarPersona.php' method='post'>";
        echo "<input type='hidden' name='personasCodificadas' value='$personasCodificadas'>";
        echo "</form>";
        echo "<script>document.getElementById('recargar').submit();</script>";
    }

    // Mostrar lista de personas registradas
    if (isset($_POST['personasCodificadas'])) {
        $personas = unserialize(base64_decode($_POST['personasCodificadas']));
    } else {
        $personas = $personasPredefinidas; // Mostrar las personas predefinidas si no hay datos
    }

    echo "<h2>Personas registradas:</h2>";
    echo "<ul>";
    foreach ($personas as $persona) {
        echo "<li>{$persona['nombre']} - Sexo: {$persona['sexo']} - Orientación: {$persona['orientacion']}</li>";
    }
    echo "</ul>";
    ?>
</body>

</html>