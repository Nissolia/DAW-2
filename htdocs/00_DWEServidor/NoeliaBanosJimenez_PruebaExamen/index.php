<?php
session_start();

if (isset($_REQUEST['borrar'])) {
    session_destroy();
    setcookie('catalogo', "", time() -1);  
    header("Location: " . $_SERVER['PHP_SELF']); 
}

if (!isset($_SESSION['catalogo'])) {
    $_SESSION['catalogo'] = [];
}

if (isset($_REQUEST['ex']) && isset($_REQUEST['sesion'])) {
    $sesion = $_REQUEST['sesion'];
    foreach ($_SESSION['catalogo'] as $catalogo => $item) {
        if ($sesion == $catalogo) {
            $extras = [];
            if (isset($_REQUEST['exCamaraTra'])) $extras[] = 'Camara Trasera';
            if (isset($_REQUEST['exAleacion'])) $extras[] = 'Llantas de Aleación';
            if (isset($_REQUEST['exClimatizador'])) $extras[] = 'Climatizador';
        }
    }
}

if (!isset($_COOKIE['catalogo'])) {
    setcookie('catalogo', serialize($_SESSION['catalogo']), strtotime("+1 year"));
} else {
    $_SESSION['catalogo'] = unserialize($_COOKIE['catalogo']);
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concesionario</title>
    <style>
        td {
            border: 1px solid black;
            padding: 10px;
        }
    </style>
</head>

<body>
    <form action="crearCoche.php" method="post">
        MARCA:<input type="text" name="marca">
        <select name="tipo" required>
            <option value="turismo">turismo</option>
            <option value="berlina">berlina</option>
            <option value="monovolumen">monovolumen</option>
            <option value="deportivo">deportivo</option>
            <option value="furgoneta">furgoneta</option>
        </select>
        <h3>Extras:</h3>
        <input type="checkbox" name="exCamaraTra">Camara trasera <br>
        <input type="checkbox" name="exAleacion">Llantas de aleación<br>
        <input type="checkbox" name="exClimatizador">Climatizador<br>
        <input type="submit" value="AÑADIR">
    </form>
</body>
<hr>
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
        foreach ($_SESSION['catalogo'] as $catalogo => $item) {
            echo " <td>$catalogo</td>";
            echo "<td>" . $item['fecha'] . "</td>";
            echo "<td>" . $item['marca'] . "</td>";
            echo "<td>" . $item['tipo'] . "</td><td>";
            $sizeEx = $item['extras'];
            if ($sizeEx <= 0) {
                echo "";
            } else {
                for ($i = 0; $i < count($item[0]); $i++) {
                    echo " - " . $item[$i] . "<br>";
                }
            } ?>
            </td>
            <td>
                <form action="" method="post">
                    <input type='text' name='ex'>
                    <input type="hidden" name="sesion" value="<?= $catalogo ?>">
                    <input type="submit" value="Añadir extra">
                </form>
            </td>
    </tr>
<?php
        }
?>

</table>
<hr>
<h3>Selecciona una categoría para ver los coches según el tipo</h3>
<form action="categoria.php" method="post">
    <select name="tipo">
        <option value="turismo">turismo</option>
        <option value="berlina">berlina</option>
        <option value="monovolumen">monovolumen</option>
        <option value="deportivo">deportivo</option>
        <option value="furgoneta">furgoneta</option>
    </select>
    <input type="submit" value="Consultar">
</form>
<hr>
<input type="submit" name='borrar' value="BORRAR TODOS LOS COCHES">

</html>