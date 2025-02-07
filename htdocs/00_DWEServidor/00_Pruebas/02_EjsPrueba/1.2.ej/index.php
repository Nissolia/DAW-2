<?php
include_once 'Jugador.php';
if (session_status() === PHP_SESSION_NONE) session_start();

// Creación de sesión para los usuarios si no existe
if (!isset($_SESSION['usuario'])) {
    $_SESSION['usuario'] = [];
}

// Si se ha pasado un nombre para el usuario, lo creamos
if (isset($_REQUEST['nombreUser']) && ($_REQUEST['nombreUser'] != "")) {
    $_SESSION['usuario'][] = new Jugador($_REQUEST['nombreUser']);
    // Refrescamos la página si se ha creado el jugador
    header('refresh:0;');
}

// Si no existe la IA en la sesión, la creamos
if (!isset($_SESSION['IA'])) {
    $_SESSION['IA'] = new Jugador('IA');
}

// Reiniciamos las cartas y puntajes si el usuario viene de jugar
if (isset($_REQUEST['vengodeJugar']) || isset($_REQUEST['pararCartas'])) {
    $_SESSION['cartasUsuario'] = [];
    $_SESSION['cartasIA'] = [];
    $_SESSION['puntuajeUsuario'] = 0;
    $_SESSION['puntuajeIA'] = 0;

    $arrayUsuario = array_search($_SESSION['seleccionUser'], $_SESSION['usuario']);

    // Determina el ganador según las puntuaciones de usuario e IA
    if ($_SESSION['puntuajeUsuario'] <= 21 && $_SESSION['puntuajeIA'] > $_SESSION['puntuajeUsuario']) {
        // Si la IA tiene más puntos y no se ha pasado de 21
        $_SESSION['usuario'][$arrayUsuario]->sumarPerdidas();
       $_SESSION['IA']->sumarGanadas();
    } else {
        // Si el jugador tiene más puntos o la IA se pasa de 21
        if ($_SESSION['puntuajeIA'] > 21 || $_SESSION['puntuajeUsuario'] > $_SESSION['puntuajeIA']) {
            $_SESSION['usuario'][$arrayUsuario]->sumarGanadas();
           $_SESSION['IA']->sumarPerdidas();
        } else {
            // Si la IA gana
           $_SESSION['IA']->sumarGanadas();
            $_SESSION['usuario'][$arrayUsuario]->sumarPerdidas();
        }
    }
}

// Si el jugador decide parar de recibir cartas, se compara el puntaje
if (isset($_REQUEST['pararCartas'])) {
   
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego de Cartas</title>
    <style>
        table, td, tr {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>

<!-- Formulario para crear un jugador -->
<form action="#" method="post">
    <input type="text" name="nombreUser" placeholder="Ingresa tu nombre">
    <input type="submit" value="Crear jugador">
</form>

<hr>

<!-- Formulario para seleccionar el jugador y empezar a jugar -->
<form action="Jugando.php" method="post">
    <select name="seleccionUser">
        <?php foreach ($_SESSION['usuario'] as $user) {
         
                echo "<option value='{$user->getNombre()}'>{$user->getNombre()}</option>";
           
        } ?>
    </select>
    <input type="submit" value="Jugar con usuario">
</form>

<hr>

<!-- Tabla que muestra los usuarios, sus victorias y derrotas -->
<h2>Ver usuarios</h2>
<table>
    <tr>
        <td>Nombre</td>
        <td>Ganadas</td>
        <td>Perdidas</td>
    </tr>
    <?php
    // Mostrar los usuarios con sus estadísticas
    echo "<tr> <td>" . $_SESSION['IA']->getNombre() . "</td><td style='color:green;'>" . $_SESSION['IA']->getGanadas() . "</td>";
    echo "<td style='color:red;'>" . $_SESSION['IA']->getPerdidas() . "</td></tr>";

    foreach ($_SESSION['usuario'] as $user) {
        echo "<tr> <td>" . $user->getNombre() . "</td><td style='color:green;'>" . $user->getGanadas() . "</td>";
        echo "<td style='color:red;'>" . $user->getPerdidas() . "</td></tr>";
    }
    ?>
</table>

</body>
</html>
