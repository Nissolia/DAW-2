<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>historico</title>
    <link rel="stylesheet" href="../View/style.css">
</head>

<body>
    <h1>Historico de incidencias resueltas por <?= $_SESSION['usuario']->getNombre() ?></h1>
    <table>
        <tr>
            <td>Descripción</td>
            <td>Profesor</td>
            <td>Fecha</td>
        </tr>
        <?php
        foreach ($data['incidencias'] as $incidencias) {
        ?>
            <td><?= $incidencias->getDescripcion() ?></td>
            <td><?= $incidencias->getProfesor() ?></td>
            <td><?= $iniici->getFecha() ?></td>
        <?php
        }
        ?>
    </table>
    <form action="../Controller/index.php" method="post">
        <input type="submit" value="VOLVER">
    </form>
</body>

</html>