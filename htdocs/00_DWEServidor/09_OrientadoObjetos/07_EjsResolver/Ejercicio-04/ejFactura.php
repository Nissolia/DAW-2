<?php
include_once 'Factura.php';
if (session_status() == PHP_SESSION_NONE) session_start();

// Si no hay facturas en la sesión, se crean
if (!isset($_SESSION['facturas'])) {
    $_SESSION['facturas'] = [];
}

// Añadir un producto a la factura seleccionada
if (isset($_POST['producto']) && ($_POST['producto'] != "")) {
    $facturaIndex = $_POST['facturaIndex'];
    $_SESSION['facturas'][$facturaIndex]->masProducto($_POST['producto']);
}

// Crear una nueva factura
if (isset($_POST['crearFactura'])) {
    $nuevaFactura = new Factura();
    $_SESSION['facturas'][] = $nuevaFactura;
}

// Ver factura seleccionada
$facturaParaVer = "";
if (isset($_POST['verFactura'])) {
    $facturaIndex = $_POST['verFactura'];
    $facturaParaVer = $_SESSION['facturas'][$facturaIndex]->ImprimeFactura();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h2>Crear una nueva factura</h2>
    <form action="" method="post">
        <label for="nombreFactura">Crea una nueva factura:</label><br>
        <input type="hidden" name="crearFactura" value="crear">
        <input type="submit" name="nuevaFactura" value="Crear Factura">
    </form>

    <hr>
    <h2>Añadir producto a una factura</h2>
    <form action="" method="post">
        <label for="facturaIndex">Selecciona una factura:</label><br>
        <select name="facturaIndex" id="facturaIndex">
            <?php foreach ($_SESSION['facturas'] as $index => $factura) {
                echo " <option value=" . $index . ">Factura " . ($index + 1) . "</option>";
            } ?>
        </select><br>
        <input type="text" name="producto" placeholder="Añade el producto aquí"><br>
        <input type="submit" value="Añadir Producto">
    </form>

    <hr>
    <h2>Ver una factura</h2>
    <form action="" method="post">
        <label for="verFactura">Selecciona una factura para ver:</label><br>
        <select name="verFactura" id="verFactura">
            <?php foreach ($_SESSION['facturas'] as $index => $factura) {
                echo " <option value=" . $index . ">Factura " . ($index + 1) . "</option>";
            } ?>
        </select><br>
        <input type="submit" value="Ver Factura">
    </form>

    <?php
    if ($facturaParaVer != "") {
        echo "<hr><h2>Detalle de la factura seleccionada:</h2>";
        echo $facturaParaVer;
    }
    ?>

</body>

</html>
