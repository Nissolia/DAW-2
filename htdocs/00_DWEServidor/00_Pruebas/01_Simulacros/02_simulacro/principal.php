<?php 
if(session_status() === PHP_SESSION_NONE) session_start();
if (!isset($_SESSION['usuario'])) {
  header('Location:'.getenv('HTTP_REFERER'));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Panel de notas del usuario <?= $_SESSION['usuario'] ?></h1>
<p>Ultima nota creada:</p>
<p>Fecha:</p>

<table>
  <tr>
    <th>Titulo</th>
    <th>Fecha</th>
    <th>Hora</th>
  </tr>
</table> 
<form action="" method="post">
Titulo:  <input type="text" name="">
  Texto: <textarea name="" id=""></textarea>
  <input type="submit" value="Añadir">
</form>
<form action="">
  <input type="submit" value="Cerrar sesion">
</form>
</body>
</html>