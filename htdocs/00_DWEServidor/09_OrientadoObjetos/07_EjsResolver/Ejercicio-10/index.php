<?php
include_once 'Bombilla.php';
session_start();


// creamos un interruptor general que esta activo por defecto
if (!isset($_SESSION['interruptor_general'])) {
    $_SESSION['interruptor_general'] = true;
}

// creamos bombillas por defecto
if (!isset($_SESSION['bombillas'])) {
    $_SESSION['bombillas'] = [
        new Bombilla('Salón', 60),
        new Bombilla('Cocina', 40),
        new Bombilla('Dormitorio', 50),
        new Bombilla('Baño', 30)
    ];
}

// las acciones que puede hacer el usuario son:
if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
        case 'Encender':
            $_SESSION['bombillas'][$_POST['indice']]->encender();
            break;
        case 'Apagar':
            $_SESSION['bombillas'][$_POST['indice']]->apagar();
            break;
        case 'Encender Interruptor General':
            $_SESSION['interruptor_general'] = true;
            break;
        case 'Apagar Interruptor General':
            $_SESSION['interruptor_general'] = false;
            break;
        case 'Añadir Bombilla':
            // creamos una bombilla
            if (!empty($_POST['ubicacion']) && !empty($_POST['potencia'])) {
                $_SESSION['bombillas'][] = new Bombilla($_POST['ubicacion'], $_POST['potencia']);
            }
            break;
    }
}

// calculamos la potencia total
$potenciaTotal = 0;
if ($_SESSION['interruptor_general']) {
    foreach ($_SESSION['bombillas'] as $bombilla) {
        if ($bombilla->estaEncendida()) {
            $potenciaTotal += $bombilla->getPotencia();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bombillas</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <h1>Bombillas</h1>
    <p>
        <strong>Interruptor General:</strong> <?= $_SESSION['interruptor_general'] ? 'Encendido' : 'Apagado' ?><br>
        <strong>Potencia Total:</strong> <?= $potenciaTotal ?> W
    </p>
    <form method="post">
        <input type="submit" name="accion" value="<?= $_SESSION['interruptor_general'] ? 'Apagar Interruptor General' : 'Encender Interruptor General' ?>">
    </form>

    <h2>Añadir nueva bombilla</h2>
    <form method="post">
        <label for="ubicacion">Ubicación:</label>
        <input type="text" name="ubicacion" id="ubicacion" required>
        <label for="potencia">Potencia (W):</label>
        <input type="number" name="potencia" id="potencia" required min="1">
        <input type="submit" name="accion" value="Añadir Bombilla">
    </form>

    <h2>Bombillas</h2>
    <div class="bombillas">
        <?php
        foreach ($_SESSION['bombillas'] as $indice => $bombilla) {
            echo "<div class='bombilla'>";

            //imagen de la bombilla encendida u apagada
            $imagenEstado = ($_SESSION['interruptor_general'] && $bombilla->estaEncendida()) ? 'on' : 'off';
            echo "<img src='bombilla_{$imagenEstado}.png' alt='Bombilla'>";
            // mosrtamos los atributos de ubicacion, potencia y lo que tiene la bombilla
            echo "<p><strong>Ubicación:</strong> " . $bombilla->getUbicacion() . "</p>";
            echo "<p><strong>Potencia:</strong> " . $bombilla->getPotencia() . " W</p>";
            echo "<p><strong>Potencia Total:</strong> " . $bombilla->getPotenciaBombilla() . " W</p>";
            // formulario para apagar o encender bombilla
            echo "<form method='post'>";
            echo "<input type='hidden' name='indice' value='$indice'>";

            // condicion para cambiar el "interruptor"
            if ($bombilla->estaEncendida() && $_SESSION['interruptor_general']) {
                echo "<input type='submit' name='accion' value='Apagar'>";
            } else {
                echo "<input type='submit' name='accion' value='Encender'>";
            }

            echo "</form></div>";
        }
        ?>







    </div>
</body>

</html>