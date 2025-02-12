<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="../View/style.css">
</head>

<body>
    <table>
        <thead>
            <tr>
                <?php
                if (isset($_SESSION['usuario'])) {
                    echo "<td colspan='3'><a href='../Controller/perfil.php'>" . $_SESSION['usuario'] . "</a></td>";
                } else {
                ?>
                    <td colspan="3"> <a href="../Controller/login.php">Inicio sesión / Registro</a></td>
                <?php } ?>
            </tr>
            <tr>
                <td>IMAGEN</td>
                <td>AUTOR</td>
                <td>LIKES</td>
                <?php
                if (isset($_SESSION['usuario'])) {
                    echo "<td>VOTAR</td>";
                } ?>
            </tr>
        </thead>
        <tbody>

            <?php
            foreach ($data['fotografias'] as $foto) {
                if (isset($data['nombreUsuario'][$data['controlIndex']])) {

            ?>
                    <tr>
                        <td>
                           
                            <!-- <a href=" C:\Dev\htdocs\00_DWEServidor\Examenes\simulacroEx-10-12\Controller\detalle.php?id=<?= $foto->getId() ?>"> -->

                                <!-- <a href="../Controller/detalle.php"> -->
                                <a href="../Controller/detalle.php?id=<?= $foto->getId() ?>">
                                    <?= $foto->getId() ?>
                                <img src="../View/imagen/<?= $foto->getImagen() ?>" alt=""></a>
                        </td>
                        <td>
                            <?= $data['nombreUsuario'][$data['controlIndex']] ?>
                        </td>
                        <td>
                            <?= $data['conteoLikes'][$data['controlIndex']] ?>
                        </td>
                <?php
                    if (isset($_SESSION['usuario'])) {
                        // hay que mirar que si el like está dado tiene que poner me gusta
                        echo "<td><a href=''>Dar like</a></td>";
                    }

                    echo "</tr>";
                }
                $data['controlIndex']++;
            }
                ?>

        </tbody>
    </table>


</body>

</html>