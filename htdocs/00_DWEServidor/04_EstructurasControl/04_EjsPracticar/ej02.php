<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 2 PHP</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <!-- Realiza un programa que pida una hora por teclado y que muestre luego buenos días, buenas tardes o buenas noches
  según la hora. Se utilizarán los tramos de 6 a 12, de 13 a 20 y de 21 a 5. respectivamente. Sólo se tienen en cuenta
  las horas, los minutos no se deben introducir por teclado. -->
  <?php
  // si recibo el parametro muestro todo lo de dentro
  if (isset($_REQUEST['hora'])) {
    echo "<h1>Mesaje:</h1>";
    $hora = $_REQUEST['hora'];
    $mensaje = '';
    if (($hora >= 6) && ($hora <= 12)) {
      echo "<h2>Buenos días</h2>";
    } else if (($hora >= 13) && ($hora <= 20)) {
      echo "<h2>Sin informaciónBuenas tardes</h2>";
    } else if (($hora >= 21 && $hora <= 23) || ($hora >= 1 && $hora <= 5)) {
      echo "<h2>Buenas noches</h2>";
    } else {
      echo "<h2>Sin información</h2>";
    }
  } else {
  ?>
    <h1>Hora por teclado</h1>
    <form action="ej02.php" method="post">
      <p>Hora en este formato: hh</p> <input class="input" type="number" name="hora" min="1" max="24" required> <br>
      <input class="boton" type="submit" value="Listo">
    </form>
  <?php
  }


  ?>

</body>

</html>