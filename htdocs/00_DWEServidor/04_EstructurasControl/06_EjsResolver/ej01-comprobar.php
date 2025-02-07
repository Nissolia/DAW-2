<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ej.1 Comprobar</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <!-- TEXTO EJEMPLO-->
  <?php
  // Comenzamos a probar si lo que tenemos funciona
  $intentos = $_REQUEST['intentos'];
  $adivinar = $_REQUEST['adivinar'];

  if ($adivinar == "loro") {
    ?>
    <h3>¡Felicidades has acertado la imagen!</h3>
    <p>Has adivinado en <?php echo $intentos; ?> intentos.</p>
    <img class="imgGrande" src="images/loro.jpg" alt="loro">
    <?php
  } else {
    ?>
    <h3>No has acertado la imagen...</h3>
    <p>Intentos realizados: <?php echo $intentos; ?></p>
    <p>Prueba de nuevo.</p>
    <h1>
      <a href="ej01-inicio.php?intentos=<?php echo $intentos + 1; ?>">INICIO</a>
    </h1>
    <?php
  }
  ?>

</body>

</html>
