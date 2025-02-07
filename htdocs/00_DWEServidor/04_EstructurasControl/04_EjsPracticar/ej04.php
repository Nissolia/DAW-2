<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 4 PHP</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <!-- Vamos a ampliar uno de los ejercicios de la relación anterior para considerar las horas extras. Escribe un programa
  que calcule el salario semanal de un trabajador teniendo en cuenta que las horas ordinarias (40 primeras horas de
  trabajo) se pagan a 12 euros la hora. A partir de la hora 41, se pagan a 16 euros la hora. -->

  <?php
  if (isset($_REQUEST['horasTrabajadas'])) {
    // Si tenemos la variable llena
    echo "<h1>Horas trabajadas</h1>";
    $horas = $_REQUEST['horasTrabajadas'];
    $salario = 0;
    if ($horas <= 40) {
      $salario = $horas * 12;
      echo "Consigues ", $salario, "€ esta semana sin horas extras.";
    } else {
      $salario = (40 * 12) + (($horas - 40) * 16);
      echo "Consigues ", $salario, "€ esta semana con horas extras.";
    }
    echo "<br>__________________________________________";
  } else {
  ?>
    <h1>Salario semanal</h1>
  <?php
  }
  ?>
  <form action="ej04.php" method="post">
    <p>Pon las horas trabajadas esta semana: </p><input class="input" type="number" name="horasTrabajadas" min="1" max="500"> <br>
    <input class="boton" type="submit" value="Listo">
  </form>
</body>
</body>

</html>