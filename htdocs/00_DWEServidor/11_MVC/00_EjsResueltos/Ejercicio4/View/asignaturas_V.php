<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
      <link rel="StyleSheet" href="../View/estilos.css" type="text/css">
      <title>
        Escuela de alumnos
      </title>
    </meta>
  </head>
  <body>
  	<div class="contenedor">
    <h1>
      ASIGNATURAS DISPONIBLES EN EL CENTRO
    </h1>
    <table>
       <tr><td>Código</td><td>Asignatura</td><td></td><td></td></tr>
    <?php
		foreach($data['asignaturas'] as $asignatura) {
	?>
     <tr><td><?=$asignatura->getCodigo()?></td>
         <td><?=$asignatura->getNombre()?></td>
         <td><form action="../Controller/alumnosMat.php" method="post">
         <input type="hidden" name="codigo" value="<?=$asignatura->getCodigo()?>">
         <input type="submit" value="Ver alumnos">
         </form></td>
         <td><form action="../Controller/eliminarAsignatura.php" method="post">
         <input type="hidden" name="codigo" value="<?=$asignatura->getCodigo()?>">
         <input type="submit" value="Eliminar">
         </form></td>
     </tr>
     <?php 
    }
      ?>
      <tr><td><a href="../Controller/nuevaAsignatura.php">Nueva Asignatura</a></td>
      <td><a href="../Controller/index.php">Volver</a></td></tr>
     </table> 
    </div>
  </body>
</html>
