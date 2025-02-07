<?php
session_start();
$inactividad = 60;
if (isset($_REQUEST['cerrar'])) {
    session_destroy();
    header("refresh: 0;");
}
if (isset($_SESSION["timeout"])) { //la primera vez no entra, pues no hay registro previo
    // Calcular el tiempo de vida de la sesión (TTL = Time To Live)
    $sessionTTL = time() - $_SESSION["timeout"];
    if ($sessionTTL > $inactividad) {
        session_destroy();
        header("refresh: 0;");
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inactividad</title>
</head>

<body>
    <?php
    if (isset($_REQUEST['user'])) {
        $_SESSION['user'] = $_REQUEST['user'];
    }
    if (!isset($_SESSION['user'])) {
    ?>
        <h3>IDENTÍQUESE</h3>
        <form action="" method="post">
            Usuario: <input type="text" name="user">
            <input type="submit" value="Aceptar">
        </form>
    <?php
    } else {
    ?>
        <h3>Bienvenido a su página personal, <?= $_SESSION['user'] ?></h3>
        <form action="" method="post">
            <input type="submit" value="Cerrar Sesión" name="cerrar">
        </form>
    <?php
    }
    //registramos en la sesión, el momento en que se ha cargado la página
    $_SESSION["timeout"] = time();
    ?>
</body>

</html>