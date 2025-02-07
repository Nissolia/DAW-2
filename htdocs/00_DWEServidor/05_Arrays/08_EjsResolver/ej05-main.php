<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Estilos básicos */
        form {
            margin-bottom: 20px;
        }
      
    </style>
</head>
<body>
    <!-- en este ejercicio precido al 2 pero se cambia el checkbox por un cuerpo de texto -->
<!-- Realizar una aplicación web que permita introducir los datos de unos aspirantes a un trabajo. Para
ello en la página principal se deberá mostrar un formulario para introducir los siguientes datos:
Nombre, edad, años de experiencia y correo. Tendremos un botón para aceptar los datos introducidos
del aspirante y otro para finalizar la lista de aspirantes. La aplicación deberá ir almacenando los datos
de los aspirantes en un array asociativo, cuyo índice principal sea el nombre. Cuando se pulse el botón
Finalizar, se enviarán los datos a otra página para mostrar el listado de los aspirantes, y como se
buscan un perfil joven, los mayores de 30 saldrán con el texto de color rojo.
Si se carga la segunda página sin enviar el listado desde la primera, se mostrará un mensaje indicando
que primero se deben introducir los aspirantes y un enlace a la primera página. -->
<h1>Registro de Aspirantes a Trabajo</h1>

<?php
// Verificar si ya hay datos previos de aspirantes
$aspirantes = [];
if (isset($_POST['aspirantesCodificado'])) {
    $aspirantes = unserialize(base64_decode($_POST['aspirantesCodificado']));
}

// Si se han enviado datos, agregamos el nuevo aspirante
if (isset($_POST['nombre']) && isset($_POST['edad']) && isset($_POST['experiencia']) && isset($_POST['correo'])) {
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $experiencia = $_POST['experiencia'];
    $correo = $_POST['correo'];

    // Almacenar datos del aspirante en el array asociativo
    $aspirantes[$nombre] = [
        "edad" => $edad,
        "experiencia" => $experiencia,
        "correo" => $correo
    ];
}

// Codificar el array de aspirantes para pasarlo entre solicitudes
$aspirantesCodificado = base64_encode(serialize($aspirantes));
?>

<!-- Formulario para ingresar datos del aspirante -->
<form action="ej05-main.php" method="post">
    <label for="nombre">Nombre:</label>
    <input class="input" type="text" name="nombre" id="nombre" required> <br>

    <label for="edad">Edad:</label>
    <input class="input" type="number" name="edad" id="edad" required><br>

    Años de experiencia:
    <input class="input" type="number" name="experiencia" id="experiencia" required><br>

    <label for="correo">Correo electrónico:</label>
    <input class="input" type="text" name="correo" id="correo" required><br>

    <!-- Pasamos los datos de los aspirantes previamente almacenados -->
    <input type="hidden" name="aspirantesCodificado" value="<?php echo $aspirantesCodificado; ?>">

    <!-- Botón para añadir al aspirante -->
    <input class="boton" type="submit" value="Añadir Aspirante">
</form>

<!-- Formulario para finalizar y ver el listado de aspirantes -->
<form action="ej05-lista.php" method="post">
    <!-- Pasamos el array de aspirantes codificado -->
    <input type="hidden" name="aspirantesCodificado" value="<?php echo $aspirantesCodificado; ?>">
    <input  class="boton" type="submit" value="Finalizar y Ver Lista">
</form>
</body>

</html>