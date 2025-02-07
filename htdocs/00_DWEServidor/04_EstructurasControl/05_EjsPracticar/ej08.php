<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio PHP</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <!-- Muestra la tabla de multiplicar de un número introducido
   por teclado. El resultado se debe mostrar en una tabla
(<table> en HTML).  -->
  <?php
  // si recibo el parametro muestro todo lo de dentro
  if (isset($_REQUEST['numero'])) {
    $numero = $_REQUEST['numero'];
  ?>
    <!-- Mensaje al inicio del formulario rellenado -->
    <h1>Tabla de multiplicar del: <?= $numero ?> </h1>
    <?php
   // Doble bucle de la tabla de multiplicar
    echo "<table class='table'>";
    for ($i = 0; $i <= 10; $i++) {
      echo "<tr> ";
        echo "<td class='td'>$numero x $i =</td>";
        $result = $numero * $i;
        echo "<td class='td'>$result</td>";
      echo "</tr>";
    }
    echo "</table>";
  } else {
    ?>
    <!-- Mensaje al inicio del formulario sin rellenar -->
    <h1>Tabla de multiplicar:</h1>
    <form action="ej08.php" method="post">
      <p>Introduce el número para hacer la tabla:</p> <input class="input" type="number" name="numero"> <br>
      <input class="boton" type="submit" value="Listo">
    </form>
  <?php
  }
  ?>

</body>

</html>