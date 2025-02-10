<?php 
  if (session_status() == PHP_SESSION_NONE) session_start();
  if (!isset($_SESSION['coches'])) {
    if (isset($_COOKIE['coches'])) {
      $_SESSION['coches']=unserialize(base64_decode($_COOKIE['coches']));
    }else{
      $_SESSION['coches']=[];
    }
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
<?php
  $tipos=['turismo','berlina','monovolumen','deportivo','furgoneta','todoterreno'];
  $fecha=time();
?>
<form action="nuevo.php" method="POST">
    <input type="hidden" name="nuevo[fecha]" value="<?= $fecha ?>">
    MARCA:<input type="text" name=nuevo[marca]>
    <select name="nuevo[tipo]">
<?php
    foreach ($tipos as $tipo) {
        echo "<option value='$tipo'>$tipo</option>";
    }
?>
    </select><br>
    Extras <br>
    <input type="checkbox" name="nuevo[extras][]" value="camara trasera">Cámara trasera<br>
    <input type="checkbox" name="nuevo[extras][]" value="llantas de aleacion">Llantas de aleación<br>
    <input type="checkbox" name="nuevo[extras][]" value="climatizador">Climatizador<br>
    <input type="submit" value="AÑADIR">
</form>
<table border="1">
    <tr>
        <th>MATRICULA</th><th>FECHA</th><th>MARCA</th><th>TIPO</th><th>EXTRAS</th>
    </tr>

<?php
  $semana=['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'];
  foreach ($_SESSION['coches'] as $matricula => $coche) {
    echo "<tr><td>$matricula</td>";
    echo "<td>".$semana[date('w',$coche['fecha'])]." - ".date('d/m/Y',$coche['fecha'])."</td>";
    echo "<td>".$coche['marca']."</td>";
    echo "<td>".$coche['tipo']."</td>";
    echo "<td>";
    if (isset($coche['extras'])) {
        foreach ($coche['extras'] as $extra) {echo "-$extra<br>";}
    }
    echo "</td>";
    ?>
     <td>
      <form action="extra.php" method="POST">
        <input type="hidden" name="matricula" value="<?= $matricula ?>">
        <input type="text" name="extra">
        <input type="submit" value="Añadir Extra">
      </form>
     </td> 
  </tr>
    <?php
  } 
?>
</table>
<hr> Selecciona un categoría para ver los coches sus coches
<form action="categoria.php" method="POST">
    <select name="categoria">
<?php
    foreach ($tipos as $tipo) {echo "<option value='$tipo'>$tipo</option>";}
?>
    </select>
    <input type="submit" value="consultar">
</form>
<hr>
<form action="borrar.php" method="POST">
  <input type="submit" value="BORRAR TODOS LOS COCHES">
</form>
</body>
</html>