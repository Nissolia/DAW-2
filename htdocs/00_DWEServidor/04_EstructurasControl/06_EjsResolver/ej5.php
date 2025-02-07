<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio X</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
<?php
  // Inicializamos las variables de fila y columna seleccionada
  $filaSeleccionada = isset($_POST['fila']) ? $_POST['fila'] : -1;
  $columnaSeleccionada = isset($_POST['columna']) ? $_POST['columna'] : -1;
?>

<table class="table">
  <?php
  // $sel = (isset($_REQUEST['seleccion']))?$_REQUEST['seleccion']:0;
  //ej05?seleccion=$n
  //imagen/$ojo
  // Creamos la tabla
  for ($fila = 0; $fila < 10; $fila++) {
    echo "<tr>";
    for ($columna = 0; $columna < 10; $columna++) {
      if ($fila == $filaSeleccionada && $columna == $columnaSeleccionada) {
        $img = "images/ojo_a.png";  
      } else {
        $img = "images/ojo_b.png";  
      }

      // Cada imagen es un botón que envía las coordenadas (fila y columna)
      echo "<td class=td>";
      echo "<form action='ej5.php' method='post'>";
      echo "<input type='hidden' name='fila' value='$fila'>";
      echo "<input type='hidden' name='columna' value='$columna'>";
      echo "<input type='image' src='$img' alt='Ojo' style='width:50px;height:50px'>";
      echo "</form>";
      echo "</td>";
    }
    echo "</tr>";
  }
  ?>
</table>

</body>
</html>
