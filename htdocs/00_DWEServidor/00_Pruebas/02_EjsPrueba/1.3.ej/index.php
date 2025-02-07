<?php
require_once 'reserva.php';
require_once 'libreria.php';
session_start();

if (!isset($_SESSION['usuarioActivo'])) {
    header('Location: login.php');
    exit();
}

$usuario = $_SESSION['usuarioActivo'];

// Cargar reservas desde el archivo
$archivo = $usuario . '.rsv';
$reservas = [];
if (file_exists($archivo)) {
    $lineas = file($archivo, FILE_IGNORE_NEW_LINES);
    $contraseña = $lineas[0]; // Primera línea es la contraseña
    for ($i = 1; $i < count($lineas); $i++) {
        $reservas[] = unserialize($lineas[$i]);
    }
}

// Procesar solicitudes de confirmación y anulación
if (isset($_REQUEST['confirmar'])) {
    $indice = $_REQUEST['indice'] ?? null;
    if ($indice !== null && isset($reservas[$indice])) {
        $reservas[$indice]->confirmar();
        actualizarFichero($usuario, $reservas);
    }
}

if (isset($_REQUEST['anular'])) {
    $indice = $_REQUEST['indice'] ?? null;
    if ($indice !== null && isset($reservas[$indice])) {
        $resultado = $reservas[$indice]->anular();
        if ($resultado === 'Ok') {
            actualizarFichero($usuario, $reservas);
        } else {
            echo "<p style='color: red;'>No se puede anular la reserva con menos de 24 horas de antelación.</p>";
        }
    }
}

// Actualizar total de pendientes en la clase
Reserva::actualizarPendientes($reservas);

// Manejar filtros manualmente
$filtro = $_POST['filtro'] ?? 'TODAS';
$reservasFiltradas = [];
foreach ($reservas as $reserva) {
    if ($filtro === 'TODAS' || $reserva->getEstado() === $filtro) {
        $reservasFiltradas[] = $reserva;
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas</title>
</head>

<body>
    <h1>Bienvenido, <?php echo ($usuario); ?></h1>
    <p>Total reservas pendientes: <?php echo Reserva::getTotalPendientes(); ?></p>

    <form method="post">
        Filtro:
        <select name="filtro">
            <option value="TODAS" <?php if ($filtro === 'TODAS') echo 'selected'; ?>>Todas</option>
            <option value="PENDIENTE" <?php if ($filtro === 'PENDIENTE') echo 'selected'; ?>>Pendientes</option>
            <option value="CONFIRMADA" <?php if ($filtro === 'CONFIRMADA') echo 'selected'; ?>>Confirmadas</option>
            <option value="ANULADA" <?php if ($filtro === 'ANULADA') echo 'selected'; ?>>Anuladas</option>
        </select>
        <input type="submit" value="Filtrar">
    </form>

    <table border="1">
        <tr>
            <th>Sala</th>
            <th>Fecha y hora</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($reservasFiltradas as $indice => $reserva): ?>
            <tr>
                <td><?php echo ($reserva->getSala()); ?></td>
                <td><?php echo ($reserva->getFechaHora()); ?></td> <!-- Aquí se corrige el error -->
                <td><?php echo ($reserva->getEstado()); ?></td>
                <td>
                    <form action="" method="post" style="display:inline;">
                        <input type="hidden" name="indice" value="<?php echo $indice; ?>">
                        <input type="hidden" name="confirmar" value="true">
                        <input type="submit" value="Confirmar">
                    </form>
                    <form action="" method="post" style="display:inline;">
                        <input type="hidden" name="indice" value="<?php echo $indice; ?>">
                        <input type="hidden" name="anular" value="true">
                        <input type="submit" value="Anular">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h2>Nueva reserva</h2>
    <form method="post" action="nueva_reserva.php">
        Sala: <input type="text" name="sala" required><br>
        Fecha y hora: <input type="datetime-local" name="fechaHora" required><br>
        <input type="submit" value="Reservar">
    </form>
    <hr>
    <form action="borrarCS.php">
        <input type="hidden" name="vaciar" value="true">
        <input type="submit" value="Cerrar sesión">
    </form>
</body>

</html>
