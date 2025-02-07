<?php
session_start();
//ponemos la fecha actual en un variable para situarnos
$fechaActual = date("d-m-Y");
$archivo = 'mascotas.txt';

// iniciamos la sesión si no existe
if (!isset($_SESSION['mascotas'])) {
    $_SESSION['mascotas'] = [];
}

// el formulario usado para crear una mascota
if (isset($_POST['nombre'])) {
    $nombre = $_POST['nombre'];
    $tipo = $_POST['tipo'];
    $edad = $_POST['edad'];

    // confirmamos que el nombre no se repita
    if (!array_key_exists($nombre, $_SESSION['mascotas'])) {
        $_SESSION['mascotas'][$nombre] = ['tipo' => $tipo, 'edad' => $edad];
    }
}

// para la escritura del archivo
if (isset($_POST['guardar'])) {
    // leemos el archivo actual
    $contenido = file_exists($archivo) ? file($archivo, FILE_IGNORE_NEW_LINES) : [];
    // mirar si la fecha ya existe
    $fechaYaEscrita = in_array("#$fechaActual#", $contenido);
    // abrimos el archivo en modo de escritura
    $fp = fopen($archivo, 'a');
    // escribimos la cabecera de fecha si no está presente
    if (!$fechaYaEscrita) {
        fwrite($fp, "#$fechaActual#" . PHP_EOL);
    }

    // añadimos las mascotas de la sesión
    foreach ($_SESSION['mascotas'] as $nombre => $datos) {
        $linea = "{$nombre}-{$datos['tipo']}-{$datos['edad']}";
        fwrite($fp, $linea . PHP_EOL);
    }

    fclose($fp);

    // limpiar las mascotas de la sesión
    $_SESSION['mascotas'] = [];
}

// función para extraer fechas únicas del archivo
function obtenerFechas($archivo)
{
    if (!file_exists($archivo)) {
        return [];
    }

    $contenido = file($archivo, FILE_IGNORE_NEW_LINES);
    $fechas = [];

    foreach ($contenido as $linea) {
        if (str_starts_with(trim($linea), "#")) {
            $fecha = trim($linea, "#");
            if (!in_array($fecha, $fechas)) {
                $fechas[] = $fecha;
            }
        }
    }

    return $fechas;
}

// manejar la búsqueda por fecha seleccionada
$mascotasPorFecha = [];
if (isset($_POST['buscarFecha']) && isset($_POST['fechaSeleccionada'])) {
    $fechaBusqueda = $_POST['fechaSeleccionada'];

    // función para buscar mascotas en el archivo
    function buscarMascotasPorFecha($archivo, $fecha)
    {
        if (!file_exists($archivo)) {
            return [];
        }

        $contenido = file($archivo, FILE_IGNORE_NEW_LINES);
        $encontradas = [];
        $capturar = false;

        foreach ($contenido as $linea) {
            if (trim($linea) === "#$fecha#") {
                $capturar = true;
            }
            if (str_starts_with($linea, "#") && $capturar) {
                // salimos si llegamos a otra fecha
                break;
            }
            if ($capturar) {
                $encontradas[] = $linea;
            }
        }
        return $encontradas;
    }
    $mascotasPorFecha = buscarMascotasPorFecha($archivo, $fechaBusqueda);
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clínica Veterinaria</title>
</head>

<body>
    <h1>Clínica Veterinaria</h1>
    <p>Fecha actual: <b><?php echo $fechaActual; ?></b></p>

    <!-- formulario para añadir mascotas -->
    <form method="POST">
        <label for="nombre">Nombre de la mascota:</label>
        <input type="text" id="nombre" name="nombre" required><br>

        <label for="tipo">Tipo de animal:</label>
        <input type="text" id="tipo" name="tipo" required><br>

        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" required><br>

        <button type="submit">Añadir Mascota</button>
    </form>

    <h2>Mascotas añadidas hoy</h2>
    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Edad</th>
        </tr>
        <?php
        foreach ($_SESSION['mascotas'] as $nombre => $datos) {
            echo "<td>$nombre</td>";
            echo "<td>" . $datos['tipo'] . "</td>";
            echo "<td>" . $datos['edad'] . "</td>";
        }
        ?>
    </table>

    <form method="POST">
        <button type="submit" name="guardar">Guardar en archivo</button>
    </form>

    <h2>Buscar mascotas por fecha</h2>

    <!-- formulario para buscar mascotas por fecha -->
    <form method="POST">
        <label for="fechaSeleccionada">Selecciona una fecha:</label>
        <select id="fechaSeleccionada" name="fechaSeleccionada" required>
            <option value="">-- Selecciona una fecha --</option>
            <?php
            $fechasDisponibles = obtenerFechas($archivo);
            foreach ($fechasDisponibles as $fecha) {
                echo " <option value=" . $fecha . ">" . $fecha . " </option>";
            }
            ?>
        </select>
        <button type="submit" name="buscarFecha">Buscar</button>
    </form>



    <?php
    if (!empty($mascotasPorFecha)) {
    ?>

    <?php
    } elseif (isset($_POST['buscarFecha'])) {
        echo "<p>No se encontraron mascotas para la fecha seleccionada.</p>";
    }

    ?>
    <h3>Mascotas registradas el <?php echo $_POST['fechaSeleccionada']; ?></h3>
    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Edad</th>
        </tr>
        <?php foreach ($mascotasPorFecha as $linea) {

            list($nombre, $tipo, $edad) = explode('-', $linea);

            echo "<tr>";
            echo " <td>$nombre</td>";
            echo "<td>$tipo</td>";
            echo "<td>$edad</td></tr>";
        } ?>
    </table>
</body>

</html>