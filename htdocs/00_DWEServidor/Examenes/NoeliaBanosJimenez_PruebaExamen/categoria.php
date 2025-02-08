<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categoria</title>
</head>
<body>
<table>
    <tr>
        <td>MATRÍCULA</td>
        <td>FECHA</td>
        <td>MARCA</td>
        <td>TIPO</td>
        <td>EXTRAS</td>
    </tr>
    <tr>
<?php
if ($_SESSION['catalogo']['tipo'] == $_REQUEST['tipo']) {
    foreach ($_SESSION['catalogo'] as $catalogo => $item) {
        echo " <td>$catalogo</td>";
        echo "<td>" . $item['fecha'] . "</td>";
        echo "<td>" . $item['marca'] . "</td>";
        echo "<td>" . $item['tipo'] . "</td><td>";
        $sizeEx = $item[0];
        if ($sizeEx <= 0) {
           echo "";
        } else {
            for ($i = 0; $i < count($item[0]); $i++) {
                echo " - " . $item[$i] . "<br>";
            }
        } ?>
        </td>
    <td>
      <input type="text">
      <input type="button" value="Añadir extra">
      </td>
      </tr>


       <?php
    }
}else{
    echo "Tipo no válido";
    header('Location:'.getenv('HTTP_REFERER'));
}
    ?>
</body>
</html>