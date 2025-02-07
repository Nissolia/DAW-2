<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo alumno</title>
    <link rel="stylesheet" href="../View/style.css">
</head>
<body>
    <form action="../Controller/anadirAlumno.php" method="post">
    Matrícula:  <input type="text" name="matricula" maxlength="10"><br>
    Nombre:  <input type="text" name="nombre" maxlength="20"><br>
    Apellidos:  <input type="text" name="apellidos" maxlength="20"><br>
    Curso:
    <select name="curso">
        <option value="1DAW">1ºDAW</option>
        <option value="2DAW">2ºDAW</option>
        <option value="1ESRG">1ºESRG</option>
        <option value="2ESRG">2ºESRG</option>
    </select>
      <input class="boton" type="submit" value="Añadir alumno">
    </form>
    <br>
    <a class="volverIndex" href="../index.php">Página principal</a>
</body>
</html>