<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Formulario Artículo</title>
    <link rel="stylesheet" href="../View/style.css">
</head>

<body>
   
    <h1>Modificar alumno</h1>
   
    <form action="../Controller/actualizarAlumno.php" method="post">
        <input type="hidden" name="id" value="<?= $data['alumnoId']->getMatricula() ?>">
    Nombre:  <input type="text" name="nombre" maxlength="20" placeholder="<?= $data['alumnoId']->getNombre() ?>"> <br>
    Apellidos:  <input type="text" name="apellidos" maxlength="20" placeholder="<?= $data['alumnoId']->getApellidos() ?>"><br>
    Curso:
    <select name="curso">
        <option value="1DAW">1ºDAW</option>
        <option value="2DAW">2ºDAW</option>
        <option value="1ESRG">1ºESRG</option>
        <option value="2ESRG">2ºESRG</option>
    </select>
      <input class="boton" type="submit" value="Modificar alumno">

<br>
    <a class="volverIndex" href="../index.php">Página principal</a>
</body>

</html>
