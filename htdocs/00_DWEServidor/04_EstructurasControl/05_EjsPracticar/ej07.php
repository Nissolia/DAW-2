<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio PHP</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <!-- Ejercicios a hacer:
   pin de desbloqueo de telefono 3 intentos  -->
  <?php
  // si recibo el parametro muestro todo lo de dentro
  if (isset($_REQUEST['pin'])) {
  ?>
    <!-- Mensaje al inicio del formulario rellenado -->
    <?php
    $pin = $_REQUEST['pin'];
    $numero = $_REQUEST['numero'];
    $intentos = $_REQUEST['intentos'];
    // Comenzamos las pruebas para que de lo que necesitamos
    if ($pin == $numero) {
      echo "<p>¡Enhorabuena has acertado!</p>";
    } else {
      $intentos--;
    }
  } else {
    $intentos = 3;
  }
  if ($intentos == 0) {
    echo "<h1>Has gastado todos tus intentos... </h1>";
  } else {
    ?>
    <!-- Mensaje al inicio del formulario sin rellenar -->
    <h1>Introduce el pin de desbloqueo:<br>te quedan <?= $intentos ?> intentos </h1>
    <form action="ej07.php" method="post">
      <input class="input" type="number" name="pin"> <br>
      <input type="hidden" name="numero" value="1234">
      <input type="hidden" name="intentos" value=<?= $intentos ?>>
      <input class="boton" type="submit" value="Desbloquear">
    </form>
  <?php
  }
  ?>
</body>

</html>