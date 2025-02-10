<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
      <link rel="StyleSheet" href="../View/estilos.css" type="text/css">
      <title>
        Blog de Articulos
      </title>
    </meta>
  </head>
  <body>
  	<div class="contenedor">
    <h1>
      Mi Blog personal
    </h1>
    <div class="nuevo"><a href="../Controller/nuevoArticulo.php">Nuevo Artículo</a></div>
    <?php
		foreach($data['articulos'] as $articulo) {
	?>
      <br><hr>
      <h3>
        <?=$articulo->getTitulo()?>
      </h3>
      <p><?=nl2br($articulo->getContenido())?></p>
      Fecha publicación: <?=$articulo->getFecha()?><br><br>
      <a href="../Controller/borraArticulo.php?codigo=<?=$articulo->getCodigo()?>">Borrar</a> &nbsp &nbsp
      <a href="../Controller/modificaArticulo.php?codigo=<?=$articulo->getCodigo()?>">Modificar</a>
      <?php
		}
	  ?>
      <hr><h2>Y no olvides entrar todos los dias para no perderte nuevos posts!!!
    </h2><br>
    </div>
  </body>
</html>
