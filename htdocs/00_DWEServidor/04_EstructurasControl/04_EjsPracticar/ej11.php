<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio PHP</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <!-- Escribe un programa que dada una hora determinada
    (horas y minutos), calcule los segundos que faltan para 
    llegar a la medianoche.-->
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