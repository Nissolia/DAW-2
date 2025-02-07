<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio PHP</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <!-- Realiza un minicuestionario con 10 preguntas tipo test sobre 
   las asignaturas que se imparten en el curso. Cada
pregunta acertada sumará un punto. El programa mostrará al final 
la calificación obtenida. Pásale el
minicuestionario a tus compañeros y pídeles que lo hagan para ver 
qué tal andan de conocimientos en las diferentes
asignaturas del curso.-->
  <?php
  // si recibo el parametro muestro todo lo de dentro
  if (isset($_REQUEST['x'])) {
  ?>
    <!-- Mensaje al inicio del formulario rellenado -->
    <h1>Mesaje:</h1>
  <?php
    $x = $_REQUEST['x'];
  } else {
  ?>
    <!-- Mensaje al inicio del formulario sin rellenar -->
    <h1>TEXTO</h1>
    <form action="ej02.php" method="post">
      <p>AQUI MÁS TEXTO</p> <input class="input" type="number" name="hora" min="1" max="24" required> <br>
      <input class="boton" type="submit" value="Listo">
    </form>
  <?php
  }
  ?>

</body>

</html>