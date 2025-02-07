<?php
  if (session_status() == PHP_SESSION_NONE) session_start();
  if (!isset($_REQUEST['categoria'])) {
    header("location:index.php");
  }
  ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table border="1">
    <tr>
        <th>MATRICULA</th><th>FECHA</th><th>MARCA</th><th>TIPO</th><th>EXTRAS</th>
    </tr>   
    <?php
  $semana=['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'];
  foreach ($_SESSION['coches'] as $matricula => $coche) {
      if ($coche['tipo']==$_REQUEST['categoria']) {
          echo "<tr><td>$matricula</td>";
          echo "<td>".$semana[date('w',$coche['fecha'])]." - ".date('d/m/Y',$coche['fecha'])."</td>";
          echo "<td>".$coche['marca']."</td>";
          echo "<td>".$coche['tipo']."</td>";
          echo "<td>";
          if (isset($coche['extras'])) {
              foreach ($coche['extras'] as $extra) {
                  echo "-$extra<br>";
                }
            }
            echo "</td></tr>";
        }
    } 
    ?>
</table> 
<br>
<form action="index.php">
    <input type="submit" value="VOLVER">
</form>
</body>
</html> 