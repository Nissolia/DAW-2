<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ej.1 Inicio</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
<!-- Partiendo del Ejercicio1, amplíalo con la siguiente funcionalidad. En la pantalla principal se mostrará el
número de intentos que lleva el usuario, que en la primera carga será de 0 intentos y conforme se
vayan pulsando los cuadrados para descubrir la imagen que esconden se irá aumentando en 1. Cuando
el usuario intente adivinar la palabra de la imagen, si acierta se mostrará el número de intentos en que
lo ha conseguido, y si ha fallado mostrará el número de intentos que lleva hasta ese momento, y al
volver a la pantalla principal seguirá aumentando el número de intentos que llevaba.
Nota: para controlar el número de intentos es necesario pasarlo como parámetro cada vez que se
navega de una página a otra, si no se pierde su valor. -->
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
      <tr>
        <td class="td">
          <a href="ej01-descubre.php?num=1&intentos=<?php echo $intentos + 1; ?>" alt=""><img src="images/oculto.jpg" alt=""></a>
        </td>
        <td class="td"><a href="ej01-descubre.php?num=4&intentos=<?php echo $intentos + 1; ?>" alt="">
            <img src="images/oculto.jpg" alt="">
          </a></td>
        <td class="td"><a href="ej01-descubre.php?num=7&intentos=<?php echo $intentos + 1; ?>" alt="">
            <img src="images/oculto.jpg" alt="">
          </a></td>
      </tr>
      <tr>
        <td class="td"><a href="ej01-descubre.php?num=2&intentos=<?php echo $intentos + 1; ?>" alt="">
            <img src="images/oculto.jpg" alt="">
          </a></td>
        <td class="td"><a href="ej01-descubre.php?num=5&intentos=<?php echo $intentos + 1; ?>" alt="">
            <img src="images/oculto.jpg" alt="">
          </a></td>
        <td class="td"><a href="ej01-descubre.php?num=8&intentos=<?php echo $intentos + 1; ?>" alt="">
            <img src="images/oculto.jpg" alt="">
          </a></td>
      </tr>
      <tr>
        <td class="td"><a href="ej01-descubre.php?num=3&intentos=<?php echo $intentos + 1; ?>" alt="">
            <img src="images/oculto.jpg" alt="">
          </a></td>
        <td class="td"><a href="ej01-descubre.php?num=6&intentos=<?php echo $intentos + 1; ?>" alt="">
            <img src="images/oculto.jpg" alt="">
          </a></td>
        <td class="td"><a href="ej01-descubre.php?num=9&intentos=<?php echo $intentos + 1; ?>" alt="">
            <img src="images/oculto.jpg" alt="">
          </a></td>
      </tr>
    </table>
  </form>
  <form action="ej01-comprobar.php" method="post">
    <input class="input" type="text" name="adivinar"> <br>
    <input type="hidden" name="intentos" value="<?php echo $intentos; ?>">
    <input class="boton" type="submit" value="Comprobar">
  </form>

</body>

</html>
