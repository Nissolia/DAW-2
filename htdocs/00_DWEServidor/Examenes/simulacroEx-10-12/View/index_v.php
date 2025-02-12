<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <table>
        <thead>
            <tr>
                <?php
                if (isset($_SESSION['usuario'])) {
                    echo "<td colspan='3'><a href='../Controller/perfil.php'>".$_SESSION['usuario']."</a></td>";
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
                    echo ' <tr><td><img src="../View/imagen/' . $foto->getImagen() . '" alt=""></td>';
                    echo '<td>';
                    echo $data['nombreUsuario'][$data['controlIndex']];
                    echo "</td><td>";
                    echo $data['conteoLikes'][$data['controlIndex']];
                    echo '</td>';
                    if (isset($_SESSION['usuario'])) {
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