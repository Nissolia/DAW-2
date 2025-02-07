<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="../View/estilo.css">
</head>
<body>
    <h1>Iniciar sesión</h1>

        <h3 class="error"><?= ($_SESSION['errorSesion']) ?></h3>

    <form action="../Controller/iniciarSesion.php" method="post">
        Usuario: <input type="text" name="usuario"> <br>
        Contraseña: <input type="password" name="pass"> <br>
        <input class="boton" type="submit" value="Iniciar sesión">
    </form>
</body>
</html>
