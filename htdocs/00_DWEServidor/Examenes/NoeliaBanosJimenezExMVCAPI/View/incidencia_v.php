<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva incidencia</title>
    <link rel="stylesheet" href="../View/style.css">
</head>
<body>
    <form action="../Controller/index.php" method="post">
    Fecha: <input type="text" name="fecha" value="<?= $data['fechaActual'] ?>">
    <br>
    Descripción:    <textarea name="descripcion" style="width: 100%;"></textarea> <br>
      <input type="submit" value="REGISTRAR">
    </form>
</body>
</html>