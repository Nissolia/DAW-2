<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ej.6 Descubre</title>
  <link rel="stylesheet" href="style.css">
  <meta http-equiv="refresh" content="0.8;url=ej01-inicio.php?intentos=<?php echo $_REQUEST['intentos']; ?>">
</head>

<body>
  <?php
  
    $intentos = isset($_REQUEST['intentos']) ? $_REQUEST['intentos'] : 0;

  // Obtener el número de imagen seleccionada y los intentos
  $num = isset($_REQUEST['num']) ? $_REQUEST['num'] : 0;
  $intentos = isset($_REQUEST['intentos']) ? $_REQUEST['intentos'] : 0;
  ?>

  <!-- Mensaje al inicio del formulario sin rellenar -->
  <h1>Adivina la imagen</h1>
  <p>Adivina el nombre de lo que aparece en la imagen</p>

  <form action="ej06-descubre.php" method="post">
    <table class="table">
      <?php
      // Usamos bucles anidados para crear una tabla
      // Contador de las imágenes (del 1 al 9)
      $imgNum = 1; 
      for ($fila = 1; $fila <= 3; $fila++) {
        echo "<tr>";
        for ($columna = 1; $columna <= 3; $columna++) {
          // Si el número de imagen coincide con $num (la seleccionada), mostramos la imagen abierta
          $imgSrc = ($imgNum == $num) ? "images/$imgNum.jpg" : "images/oculto.jpg";
          echo "<td class='td'><img src='$imgSrc' alt=''></td>";
           // Incrementamos el número de la imagen
          $imgNum++;
        }
        echo "</tr>";
      }
      ?>
    </table>

    <input class="input" type="text" name="adivinar" placeholder="Escribe tu adivinanza aquí"> <br>
    <input type="hidden" name="intentos" value="<?php echo $intentos; ?>">
    <input class="boton" type="submit" value="Comprobar">
  </form>
</body>

</html>
