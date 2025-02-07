<?php
include_once 'Email.php';
include_once 'libreria.php';
if (session_status() === PHP_SESSION_NONE) session_start();

// comprobamos si se ha pasado la informacion del usuario elegido
if (isset($_REQUEST['usuarioElegido'])) {
    $_SESSION['usuarioActivo'] = $_REQUEST['usuarioElegido'];
}
// comprobamos si hay un usuario activo
if (!isset($_SESSION['usuarioActivo'])) {
    header('Location: login.php');
}
if (isset($_REQUEST['usuarioRegistrado'])) {
    // miramos en la sesion de los usuarios
    foreach ($_SESSION['usuarios'] as $key => $value) {
        // tenemos el emisor y comprobamos que no se repita
        if (!in_array($value->getEmisor(), $_SESSION['emisores'])) { //si no existe en sesion lo añadimos
            // guardamos los emisores en una sesion para usarlo en el session y donde corresponda
            $_SESSION['usuarioActivo'] = $_REQUEST['usuarioRegistrado'];
            header('Location: index.php');
        } else {
            $_SESSION['error'] = "<h3 style='color:red;'>Ese nombre de usuario ya existe</h3>";
        }
    }
}
// registro de email nuevo
if (isset($_REQUEST['asunto'])) {
    // creamos el objeto al habernos pasado la informacion
    anadirEmail(new Email($_REQUEST['emisor'], $_SESSION['usuarioActivo'], time(), $_REQUEST['asunto']));
}
// guardamos el usuario elegido
if (!isset($_COOKIE['usuario'])) {
    setcookie('usuario', $_SESSION['usuarioActivo'], strtotime('+2 days'));
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <h1>Bienvenid@ <?= $_SESSION['usuarioActivo']; ?></h1>


    <h3>Cantidad de correos importantes: <?php echo Email::getImportantes(); ?></h3>
    <form action="" method="post">
        <input type="hidden" name="emisor" value="true">
        Receptor: <select name="usuarioReceptor">
            <?php
            foreach ($_SESSION['emisores'] as $key => $value) {
                echo " <option value='" . $value . "'>$value</option>";
            }
            ?>
        </select>
        Asunto:
        <input type="text" name="asunto">
        <input type="submit" value="Registrar correo">
    </form>
    <hr>
    <!-- tabla de listado de emails -->
    <table>
        <tr>
            <th colspan="6">Listado de emails</th>
        </tr>
        <tr>
            <td>EMISOR</td>
            <td>RECEPTOR</td>
            <td>FECHA</td>
            <td>ASUNTO</td>
        </tr>
        <?php
        foreach ($_SESSION['usuarios'] as $index => $value) {
            echo "<tr>";
            echo "<td>" . $value->getEmisor() . "</td>";
            echo "<td>" . $value->getReceptor() . "</td>";
            echo "<td>" . $value->getFecha() . "</td>";
            if ($value->comprobarImportante()) {
                echo "<td style='color:green;border-color: green;'> " . $value->getAsunto() . "</td>";
                $value->sumarImportantes();
            } else {

                echo "<td>" . $value->getAsunto() . "</td>";
            }
            if ($value->getEmisor() == $_SESSION['usuarioActivo']) {
        ?>
                <td>
                    <form action="modificarListado.php" method="post">
                        <input type="hidden" name="destacar" value="true">
                        <input type="submit" value="Destacar">
                    </form>
                </td>
                <td>
                    <form action="modificarListado.php" method="post">
                        <input type="hidden" name="retrasar" value="true">
                        <input type="submit" value="Retrasar">
                    </form>
                </td>
        <?php
            }
            echo " </tr>";
        }
        ?>
    </table>
    <?php echo $_SESSION['error']; ?>
    <hr>
    <form action="cerrarSesion.php" method="post">
        <input type="hidden" name="cerrarSesion" value="true">
        <input type="submit" value="Cerrar sesion">
    </form>
</body>

</html>