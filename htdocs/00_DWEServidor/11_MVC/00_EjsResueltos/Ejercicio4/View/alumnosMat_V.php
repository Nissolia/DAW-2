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
      Asignatura: <?=$data['asignatura']->getNombre()?>
    </h1>
    <table>
       <tr><td>Matricula</td><td>Nombre</td><td></td></tr>
    <?php
		foreach($data['alumnos'] as $alumno) {
	?>
     <tr><td><?=$alumno->getMatricula()?></td>
         <td><?=$alumno->getApellidos()?>,<?=$alumno->getNombre()?></td>
         <td><form action="../Controller/desmatricular.php" method="post">
         <input type="hidden" name="matricula" value="<?=$alumno->getMatricula()?>">
         <input type="hidden" name="codigo" value="<?=$data['asignatura']->getCodigo()?>">
         <input type="submit" value="Desmatricular">
         </form></td>
     </tr>
     <?php 
    }
      ?>
      <td colspan="3"><a href="../Controller/asignaturas.php">Volver</a></td>
     </table> 
    </div>
  </body>
</html>
