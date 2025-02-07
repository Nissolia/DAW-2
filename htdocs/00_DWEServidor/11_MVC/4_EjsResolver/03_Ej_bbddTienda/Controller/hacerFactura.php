<?php
require_once '../Model/Cesta.php';

if (isset($_POST['generarFactura'])) {
    $data = [];
    $data['factura'] = Cesta::procesarCompra();

    if (!$data['factura']) {
        $data['error'] = "No se pudo generar la factura.";
    }

    include_once '../View/hacerFactura_v.php';
}
