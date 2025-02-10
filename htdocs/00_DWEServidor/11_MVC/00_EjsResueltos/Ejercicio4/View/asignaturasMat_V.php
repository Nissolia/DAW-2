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
      Alumno: <?=$data['alumno']->getApellidos()?>, <?=$data['alumno']->getNombre()?>
    </h1>
    <table>
       <tr><td>Código</td><td>Asignatura</td><td></td></tr>
    <?php
		foreach($data['asignaturas'] as $asignatura) {
	?>
     <tr><td><?=$asignatura->getCodigo()?></td>
         <td><?=$asignatura->getNombre()?></td>
         <td><form action="../Controller/desmatricular.php" method="post">
          <!-- La matricula debe ser enviada como parametro porque desmatricular.php es llamado desde otros controladores -->
         <input type="hidden" name="matricula" value="<?=$_SESSION['matricula']?>">
         <input type="hidden" name="codigo" value="<?=$asignatura->getCodigo()?>">
         <input type="submit" value="Desmatricular">
         </form></td>
     </tr>
     <?php 
    }
      ?>
      <td colspan="2"><a href="../Controller/matricular.php">Matricula nueva</a></td><td><a href="../Controller/index.php">Volver</a></td>
     </table> 
    </div>
  </body>
</html>
