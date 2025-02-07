<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ej.1 Descubre</title>
  <link rel="stylesheet" href="style.css">
  <meta http-equiv="refresh" content="0.8;url=ej01-inicio.php?intentos=<?php echo $_REQUEST['intentos']; ?>">
</head>

<body>
  <?php
  $num = $_REQUEST['num'];
  $intentos = $_REQUEST['intentos'];
  ?>
  <!-- Mensaje al inicio del formulario sin rellenar -->
  <h1>Adivina la imagen</h1>
  <p>Adivina el nombre de lo que aparece en la imagen</p>
  <form action="ej01-descubre.php" method="post">
    <table class="table">
      <tr>
        <td class="td"><img src="<?php echo ($num == 1) ? "images/1.jpg" : "images/oculto.jpg" ?>" alt=""></td>
        <td class="td"><img src="<?php echo ($num == 4) ? "images/4.jpg" : "images/oculto.jpg" ?>" alt=""></td>
        <td class="td"><img src="<?php echo ($num == 7) ? "images/7.jpg" : "images/oculto.jpg" ?>" alt=""></td>
      </tr>
      <tr>
        <td class="td"><img src="<?php echo ($num == 2) ? "images/2.jpg" : "images/oculto.jpg" ?>" alt=""></td>
        <td class="td"><img src="<?php echo ($num == 5) ? "images/5.jpg" : "images/oculto.jpg" ?>" alt=""></td>
        <td class="td"><img src="<?php echo ($num == 8) ? "images/8.jpg" : "images/oculto.jpg" ?>" alt=""></td>
      </tr>
      <tr>
        <td class="td"><img src="<?php echo ($num == 3) ? "images/3.jpg" : "images/oculto.jpg" ?>" alt=""></td>
        <td class="td"><img src="<?php echo ($num == 6) ? "images/6.jpg" : "images/oculto.jpg" ?>" alt=""></td>
        <td class="td"><img src="<?php echo ($num == 9) ? "images/9.jpg" : "images/oculto.jpg" ?>" alt=""></td>
      </tr>
    </table>
    <input class="input" type="text" name="adivinar"> <br>
    <input type="hidden" name="intentos" value="<?php echo $intentos; ?>">

    <input class="boton" type="submit" value="Comprobar">
  </form>
</body>

</html>
