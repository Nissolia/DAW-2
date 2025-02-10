<?php
if (session_status() == PHP_SESSION_NONE) session_start();
require_once '../Model/Producto.php';

$fichero = fopen("factura.txt", "w");
fputs($fichero,"FACTURA DE COMPRA ".PHP_EOL.PHP_EOL);
fputs($fichero, "CODIGO \t PRODUCTO \t\t CANTIDAD \t PRECIO \t IMPORTE". PHP_EOL);
$total=0;
$data['mensaje']="";
foreach ($_SESSION['productos'] as $prod => $cantidad) {
	//el siguiente bloque escribe la linea del producto en el fichero factura
	$producto=Producto::getProductoById($prod);
	
	$diferencia=$producto->getStock()-$cantidad;
	if ($diferencia>=0) {
		$importe=$cantidad*$producto->getPrecio();
		$producto->vender($cantidad);
	}else if ($producto->getStock()>0){
		$importe=$producto->getStock() * $producto->getPrecio();
		$cantidad=$producto->getStock();
		$producto->vender($producto->getStock());
		$data['mensaje'].="Unidades insuficientes del producto: ".$producto->getNombre().", seran vendidas solo ".$cantidad." unidades<br>";
		// echo "<script>alert (\"Unidades insuficientes del producto: ".$producto->getNombre().", seran vendidas solo ".$cantidad." unidades\");</script>";
	}else{
		$importe=0;
		$cantidad=0;
		$data['mensaje'].="No hay unidades del producto: ".$producto->getNombre().", así que no será vendido<br>";
		// echo "<script>alert (\"No hay unidades del producto: ".$producto->getNombre().", así que no será vendido\n");</script>";
	}
	if ($cantidad>0) {
		$linea=$producto->getCodigo()."\t ".$producto->getNombre()."\t\t ".$cantidad."\t\t ".$producto->getPrecio()."\t\t ".$importe;
		fputs($fichero,$linea.PHP_EOL);
		$total+=$importe;
	}  
}

fputs($fichero,"------------------------------------------------------".PHP_EOL);
$linea="Base imponible: ".$total;
fputs($fichero,$linea.PHP_EOL);
$total*=1.21;
$linea="Importe total con IVA: ".$total." euros";
fputs($fichero,$linea.PHP_EOL);
fclose($fichero);

session_destroy();
setcookie("total", "", -1);
setcookie("cantidad", "", -1);
setcookie("productos", "", -1);
include '../View/finalizarCompra_V.php';