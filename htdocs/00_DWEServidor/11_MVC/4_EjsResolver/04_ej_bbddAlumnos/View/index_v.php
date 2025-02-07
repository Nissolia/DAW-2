<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página principal</title>
    <link rel="stylesheet" href="../View/style.css">
</head>

<body>
    <table>
        <tr>
            <th colspan="2">Modificaciones</th>
            <th>Matrícula</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Curso</th>
            <th>Acciones</th>
        </tr>
        
    
            <?php
            foreach ($data['alumno'] as $alumnos) {
            ?>
                <tr>
                <td>
                    <form action="../Controller/modificarAlumno.php" method="post">
                      <input type="hidden" name="id" value="<?= $alumnos->getMatricula() ?>">
                      <input class="boton modificar" type="submit" value="Modificar">
                    </form>
                </td>
                <td>
                    <form action="" method="post">
                      <input type="hidden" name="id" value="<?= $alumnos->getMatricula() ?>">
                      <input class="boton eliminar" type="submit" value="Eliminar">
                    </form>
                </td>
                <td><?= $alumnos->getMatricula() ?></td>
                <td><?= $alumnos->getNombre() ?></td>
                <td> <?= $alumnos->getApellidos() ?></td>
                <td><?= $alumnos->getCurso() ?></td>
                <td>
                    <form action="../Controller/detallesAlumno.php" method="post">
                      <input type="hidden" name="id" value="<?= $alumnos->getMatricula() ?>">
                      <input class="boton detalle" type="submit" value="Detalles">
                    </form>
                </td>
                </tr>
            <?php
            }
            ?>
        
        <tr>
            <td colspan="4">
                <form action="../Controller/nuevoAlumno.php" method="post">
                    <input class="boton" type="submit" value="Añadir alumno">
                </form>
            </td>
        
            <td colspan="3">
                <form action="../Controller/asignaturas.php" method="post">
                    
                    <input class="boton" type="submit" value="Asignaturas">
                </form>
            </td>
        </tr>
    </table>
</body>

</html>