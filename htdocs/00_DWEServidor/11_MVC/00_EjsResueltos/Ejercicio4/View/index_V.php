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
      Alumnos del IES Ruiz Gijón
    </h1>
    <table>
       <tr><th></th><th></th><th>Matricula</th><th>Apellidos</th><th>Nombre</th><th>Curso</th><th></th></tr>
    <?php
		foreach($data['alumnos'] as $alumno) {
	?>
     <tr><td><form action="../Controller/eliminarAlumno.php" method="post">
           <input type="hidden" name="matricula" value="<?=$alumno->getMatricula()?>">
           <input type="submit" value="Eliminar">
         </form></td>
         <td><form action="../Controller/modificaAlumno.php" method="post">
           <input type="hidden" name="matricula" value="<?=$alumno->getMatricula()?>">
           <input type="submit" value="Modificar">
         </form></td>
         <td><?=$alumno->getMatricula()?></td>
         <td><?=$alumno->getApellidos()?></td>
         <td><?=$alumno->getNombre()?></td>
         <td><?=$alumno->getCurso()?></td>
         <td><form action="../Controller/asignaturasMat.php" method="post">
           <input type="hidden" name="matricula" value="<?=$alumno->getMatricula()?>">
           <input type="submit" value="Ver asignaturas">
         </form></td>
     </tr>
     <?php 
    }
      ?>
      <td></td>
      <td colspan="3"><a href="../Controller/nuevoAlumno.php">Nuevo Alumno</a></td>
      <td><a href="../Controller/asignaturas.php">Asignaturas</a></td>
     </table> 
    </div>
  </body>
</html>
