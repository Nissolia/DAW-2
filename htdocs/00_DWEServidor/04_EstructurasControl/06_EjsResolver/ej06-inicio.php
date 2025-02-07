<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ej.6 Inicio</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <!-- Mensaje al inicio del formulario sin rellenar -->
  <h1>Adivina la imagen</h1>

  <?php
  // Inicializar el número de intentos
  $intentos = isset($_REQUEST['intentos']) ? $_REQUEST['intentos'] : 0;
  ?>

  <p>Número de intentos: <?php echo $intentos; ?></p>

  <form action="ej01-descubre.php" method="post">
    <p>Adivina el nombre de lo que aparece en la imagen</p>
    <table class="table">
      <?php
      // Usamos bucles anidados para crear una tabla de 3 filas y 3 columnas
      // Contador para cada imagen
      $num = 1; 
      for ($fila = 1; $fila <= 3; $fila++) { 
          echo "<tr>";
          for ($columna = 1; $columna <= 3; $columna++) { 
              echo "<td class='td'>
                      <a href='ej06-descubre.php?num=$num&intentos=" . ($intentos + 1) . "'>
                        <img src='images/oculto.jpg' alt=''>
                      </a>
                    </td>";
                    // Incrementamos el número de imagen
              $num++; 
          }
          echo "</tr>";
      }
      ?>
    </table>
  </form>

  <form action="ej0-comprobar.php" method="post">
    <input class="input" type="text" name="adivinar"> <br>
    <input type="hidden" name="intentos" value="<?php echo $intentos; ?>">
    <input class="boton" type="submit" value="Comprobar">
  </form>

</body>

</html>
