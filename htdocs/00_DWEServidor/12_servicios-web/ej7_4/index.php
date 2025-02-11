<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestor de Alumnos y Asignaturas</title>
</head>
<body>
    <h1>Gestor de Alumnos y Asignaturas</h1>
    <form action="peticion.php" method="POST">
        <fieldset>
            <legend>Seleccione una opción:</legend>
            <label>
                <input type="radio" name="tipo" value="alumnos"> Mostrar Alumnos
            </label>
            <br>
            <label>
                <input type="radio" name="tipo" value="grupo"> Mostrar Grupo
            </label>
            <br>
            <label>
                <input type="radio" name="tipo" value="asignaturas"> Mostrar Asignaturas
            </label>
        </fieldset>
        <br>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre">
        <br>
        <label for="grupo">Grupo:</label>
        <input type="text" id="grupo" name="grupo">
        <br>
        <label for="matricula">Matrícula:</label>
        <input type="text" id="matricula" name="matricula">
        <br>
        <label for="codigo">Código de Asignatura:</label>
        <input type="text" id="codigo" name="codigo">
        <br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
