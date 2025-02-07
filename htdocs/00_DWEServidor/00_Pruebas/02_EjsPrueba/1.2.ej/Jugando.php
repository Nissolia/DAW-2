<?php
include_once 'Jugador.php';
include_once 'Cartas.php';
if (session_status() === PHP_SESSION_NONE) session_start();

// Definimos si hemos perdido o no
if (!isset($_SESSION['perdido'])) {
    $_SESSION['perdido'] = false;
}

// Si no hay usuario en sesión, redirigir a la página principal
if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit(); // Detenemos la ejecución para evitar que el resto del código se ejecute
}
if (!isset($_SESSION['IA'])) {
    $_SESSION['IA'] = new Jugador('IA');
    header('Location: index.php');
    exit(); // Detenemos la ejecución para evitar que el resto del código se ejecute
}

// Si no existe la carta, la creamos
if (!isset($_SESSION['carta'])) {
    $_SESSION['carta'] = new Cartas();
    $_SESSION['cartaDada'] = 0;
}

// Si no existe la IA, la creamos
if (!isset($_SESSION['IA'])) {
    $_SESSION['IA'] = new Jugador('IA');
}

// Selección del usuario desde el formulario
if (isset($_REQUEST['seleccionUser'])) {
    $_SESSION['seleccionUser'] = $_REQUEST['seleccionUser'];
}

if (isset($_SESSION['seleccionUser'])) {
    echo "<h1>Jugando como " . $_SESSION['seleccionUser'] . "</h1>";
}

if (isset($_REQUEST['darCarta'])) {
    // Confirmamos que la sesión carta existe
    if (isset($_SESSION['carta'])) {
        $cartaPedida = $_SESSION['carta']->pedirCarta();
        $_SESSION['cartasUsuario'][] = $cartaPedida;
        $_SESSION['cartaDada'] = $cartaPedida;
    }
}

// Lógica para verificar si el usuario ha perdido
if ($_SESSION['puntuajeUsuario'] > 21) {
    echo "Te has pasado de 21...<br> <h3>Has perdido</h3>";
    $_SESSION['perdido'] = true;  // Guardamos el estado de perdido en la sesión
    $arrayUsuario =  array_search($_SESSION['seleccionUser'], $_SESSION['usuario']);
    $_SESSION['usuario'][$arrayUsuario]->sumarPerdidas();  // Solo una vez
   
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego de Cartas</title>
    <style>
        table,
        td,
        tr {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <?php
    // Mostrar formulario si no se ha perdido y el puntaje es mayor a 0
    if (!$_SESSION['perdido'] && $_SESSION['puntuajeUsuario'] >= 0) {
        echo "<div>";
    } else {
        echo "<div style='display: none;'>";
    }
    ?>
    <h2>Pide carta aquí</h2>
    <form action="" method="post">
        <input type="hidden" name="darCarta">
        <input type="submit" value="Sacar carta">
    </form>
    <?php
    echo "</div>"; // Cierra el div del formulario
    ?>
    <hr>
    <!-- cartas pedidas del usuario -->
    <h2>Cartas pedidas del usuario</h2>
    <?php
    foreach ($_SESSION['cartasUsuario'] as $cartas) {
        echo $cartas . ", ";
    }
    ?>
    <h2>Conteo Cartas usuario</h2>
    <?php
    Cartas::conteoCartas('Usuario');
    echo "Puntuaje del usuario: " . $_SESSION['puntuajeUsuario'] . "<br>";
    ?>

    <hr>
    <!-- cartas que da la IA -->
    <h2>Cartas pedidas IA</h2>
    <?php
    foreach ($_SESSION['cartasIA'] as $cartas) {
        echo $cartas . ", ";
    }

    echo "<h2>Conteo Cartas IA</h2>";

    // La IA solo juega si el usuario no ha perdido
    if ($_SESSION['puntuajeUsuario'] <= 21 && !$_SESSION['perdido']) {
        // La IA sigue pidiendo cartas si su puntuación es menor o igual a 19
        while ($_SESSION['puntuajeIA'] <= 19) {
            $cartaPedida = $_SESSION['carta']->pedirCarta();
            $_SESSION['cartasIA'][] = $cartaPedida;
            Cartas::conteoCartas('IA');
        }
    }

    echo "Puntuaje de la IA: " . $_SESSION['puntuajeIA'] . "<br>";

    // Verificar si la IA ha perdido
    if ($_SESSION['puntuajeIA'] > 21) {
        echo "La IA ha perdido<br>";
        $arrayUsuario = array_search('IA', $_SESSION['usuario']);
        $_SESSION['usuario'][$arrayUsuario]->sumarGanadas();
        $arrayUsuario = array_search($_SESSION['seleccionUser'], $_SESSION['usuario']);
        $_SESSION['usuario'][$arrayUsuario]->sumarPerdidas();
    }
    ?>
    <hr>

    <form action="index.php" method="post">
        <input type="hidden" name="pararCartas">
        <input type="submit" value="Parar de recibir cartas">
    </form>
    <hr>
    <form action="index.php" method="post">
        <input type="hidden" name="vengodeJugar">
        <input type="submit" value="Volver a index">
    </form>

    <?php 
    if ($_SESSION['puntuajeUsuario']>21) {
        $_SESSION['cartasUsuario'] = [];
        $_SESSION['cartasIA'] = [];
        $_SESSION['puntuajeUsuario'] = 0;
        $_SESSION['puntuajeIA'] = 0;
    }
  
     ?>
</body>

</html>
