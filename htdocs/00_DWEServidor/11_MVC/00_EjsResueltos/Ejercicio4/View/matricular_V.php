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
    <h1>Alumno: <?=$data['alumno']->getApellidos()?>, <?=$data['alumno']->getNombre()?></h1>
    <h3>Matricular en un nuevo módulo</h3>
    <table>
       <tr><td>Código</td><td>Asignatura</td><td></td></tr>
    <?php
		foreach($data['asignaturas'] as $asignatura) {
	?>
     <tr><td><?=$asignatura->getCodigo()?></td>
         <td><?=$asignatura->getNombre()?></td>
         <td><form action="../Controller/grabaMatricula.php" method="post">
         <input type="hidden" name="matricula" value="<?=$data['alumno']->getMatricula()?>">
         <input type="hidden" name="codigo" value="<?=$asignatura->getCodigo()?>">
         <input type="submit" value="Matricular">
         </form></td>
     </tr>
     <?php 
    }
      ?>
      <td><a href="../Controller/asignaturasMat.php">Volver</a></td>
     </table> 
    </div>
  </body>
</html>
