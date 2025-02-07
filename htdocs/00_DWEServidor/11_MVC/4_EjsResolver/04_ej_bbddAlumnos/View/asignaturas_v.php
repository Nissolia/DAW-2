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
            <th>Código</th>
            <th>Nombre</th>
            
        </tr>
            <?php
            foreach ($data['asignatura'] as $asignaturas) {
            ?>
                <tr>
                <td><?= $asignaturas->getCodigoAsignatura() ?></td>
                <td><?= $asignaturas->getNombre() ?></td>
              
                <td>
                    <form action="../Controller/detallesasignatura.php" method="post">
                      <input type="hidden" name="id" value="<?= $asignaturas->getMatricula() ?>">
                      <input type="submit" value="Ver alumnos">
                      <!-- ver los alumnos y dentro de estos se ve el boton de desmatricular de los alumnos -->
                    </form>
                </td>
                </tr>
            <?php
            }
            ?>
        
        <tr>
            <td colspan="2">
                <form action="../Controller/nuevoasignatura.php" method="post">
                    <input class="boton" type="submit" value="Añadir asignatura">
                </form>
            </td>
        
            <td colspan="2">
                <form action="../Controller/asignaturas.php" method="post">
                    
                    <input class="boton" type="submit" value="Asignaturas">
                </form>
            </td>
        </tr>
    </table>
    <br>
    <a class="volverIndex" href="../index.php">Página principal</a>
</body>

</html>