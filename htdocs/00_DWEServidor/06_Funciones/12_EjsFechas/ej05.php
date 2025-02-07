<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej 5</title>
</head>
<body>
      <!-- Ejercicio 5 -->
      <h2>Ejercicio 5: Próximo día de la semana</h2>
      <form action="" method="post">
          Selecciona un día de la semana:
          <select name="diaSemana" required>
              <option value="Monday">Lunes</option>
              <option value="Tuesday">Martes</option>
              <option value="Wednesday">Miércoles</option>
              <option value="Thursday">Jueves</option>
              <option value="Friday">Viernes</option>
              <option value="Saturday">Sábado</option>
              <option value="Sunday">Domingo</option>
          </select>
          <input type="submit" value="Enviar">
      </form>
  
      <?php 
      if (isset($_POST['diaSemana'])) {
        $diasEnEspanol = [
            'Sunday' => 'Domingo',
            'Monday' => 'Lunes',
            'Tuesday' => 'Martes',
            'Wednesday' => 'Miércoles',
            'Thursday' => 'Jueves',
            'Friday' => 'Viernes',
            'Saturday' => 'Sábado'
        ];
          $diaElegido = $_POST['diaSemana'];
          $proximoDia = strtotime("next $diaElegido");
          echo "El próximo $diasEnEspanol[$diaElegido] de la semana es: " . date("d-m-Y", $proximoDia) . "<br>";
      }
      ?>
</body>
</html>