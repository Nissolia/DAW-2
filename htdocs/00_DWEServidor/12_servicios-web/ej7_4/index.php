<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Servicio Web de Matriculaciones</title>
</head>
<body>
    <h1>Servicio Web de Matriculaciones</h1>
    <form action="peticion.php" method="POST">
        <fieldset>
            <legend>Seleccione una consulta o acción:</legend>
            <label>
                <input type="radio" name="tipo" value="grupo"> Alumnos por Grupo
            </label>
            <br>
            <label>
                <input type="radio" name="tipo" value="nombre"> Alumnos por Nombre
            </label>
            <br>
            <label>
                <input type="radio" name="tipo" value="asignaturas"> Asignaturas por Alumno
            </label>
            <br>
            <label>
                <input type="radio" name="tipo" value="matricular"> Matricular Alumno en Asignatura
            </label>
            <br>
            <label>
                <input type="radio" name="tipo" value="cambiar_grupo"> Cambiar Grupo de Alumno
            </label>
            <br>
            <label>
                <input type="radio" name="tipo" value="borrar"> Borrar Alumno
            </label>
        </fieldset>
        <br>
        <label for="grupo">Grupo:</label>
        <input type="text" id="grupo" name="grupo">
        <br>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre">
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
