<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio PHP</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <!-- introduce numero de filas y columnas de
   la tabla que vamos a crear , max de 50-->
  <?php
  // si recibo el parametro muestro todo lo de dentro
  if (isset($_REQUEST['filas'])) {
  ?>
    <!-- Mensaje al inicio del formulario rellenado -->
    <?php
    $numTabla = 1;
    $filas = $_REQUEST['filas'];
    $columnas = $_REQUEST['columnas'];
    if ($filas == 0 || $filas == "" || $columnas == 0 || $columnas == "") {
      echo "<h1>Números incorrectos.</h1>";
    } else {
      echo "<h1>Tabla de $filas filas y $columnas columnas.</h1>";
      echo "<table class='table'>";
      for ($i = 0; $i < $filas; $i++) {
        echo "<tr>";
        for ($j = 0; $j < $columnas; $j++) {
          echo "<td class='td'>$numTabla++</td>";
        }
        echo "</tr>";
      }
      echo "   </table>";
    }
  } else {
    ?>
    <!-- Mensaje al inicio del formulario sin rellenar -->
    <h1>Creación de tabla: </h1>
    <form action="ej00.php" method="post">
      <p>Pon las filas (max 50):</p> <input class="input" type="number" name="filas"> <br>
      <p>Pon las columnas (max 50):</p> <input class="input" type="number" name="columnas"> <br>
      <input class="boton" type="submit" value="Hacer la tabla">
    </form>
  <?php
  }
  ?>

</body>

</html>