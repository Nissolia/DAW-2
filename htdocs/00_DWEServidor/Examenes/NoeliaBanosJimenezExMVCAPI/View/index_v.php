<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="../View/style.css">
</head>

<body>
    <h1>Perfil
        <?php
        if (isset($data['esAdmin'])) {
            echo " administrador: ";
        } else {
            echo " usuario: ";
        }
        ?><?= $_SESSION['usuario']->getNombre() ?></h1>
    <?php
    //    si existe mostramos la tabla
    if ($data['incidencias']) {
    ?>
        <table>
            <tr>
                <th>Descripción</th>
                <th>Profesor</th>
                <th>Fecha</th>
                <?php
                // si es admin le salen algunas opciones más
                if (isset($data['esAdmin'])) {
                ?>
                    <th colspan="3">Estado</th>
                <?php
                }
                ?>
            </tr>
            <?php
            foreach ($data['incidencias'] as $incidencia) {
            ?>
                <tr>
                    <td><?= $incidencia->getDescripcion() ?></td>
                    <td><?= $incidencia->getProfesor() ?></td>
                    <td><?= $incidencia->getFecha() ?></td>
                    <?php
                    // si es admin le salen algunas opciones más
                    if (isset($data['esAdmin'])) {
                    ?>

                        <td><?= $incidencia->getEstado() ?></td>
                        <!-- tener en cuenta que sale disabled si la persona no es el admin encargado -->
                        <?php
                        if ($_SESSION['usuario']->getId() == $incidencia->getAdmin()) {
                        ?>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="idIncidencia" value=" <?= $incidencia->getId() ?>">
                                    <input type="submit" name="finalizar" value="FINALIZADA">
                                </form>
                            </td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="idIncidencia" value=" <?= $incidencia->getId() ?>">
                                    <input type="submit" name="soltar" value="SOLTAR">
                                </form>
                            </td>
                        <?php
                        } else {
                            echo "<td>SIN FINALIZAR</td>";
                        ?>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="idIncidencia" value=" <?= $incidencia->getId() ?>">

                                    <input type="submit" name="reparar" value="REPARAR">
                                </form>
                            </td>
                        <?php
                        }
                        ?>



                    <?php
                    }
                    ?>
                </tr>

            <?php
            } ?>

        </table>
    <?php
    }

    if (isset($data['esAdmin'])) {
    ?>
        <form action="../Controller/historico.php" method="post">
            <input type="submit" value="HISTÓRICO DE INCIDENCIAS RESUELTAS">
        </form>
    <?php
    } else {
    ?>
        <form action="../Controller/nuevaIncidencia.php" method="post">
            <input type="submit" name="nuevaIncidencia" value="REGISTRAR UNA INCIDENCIA NUEVA">
        </form>
    <?php
    }

    ?>

    <a href="../Controller/cerrarSesion.php">CERRAR SESIÓN DE USUARIO</a>
</body>

</html>