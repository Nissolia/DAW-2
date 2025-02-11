<?php
session_start();
require_once '../Model/Producto.php';
require_once '../Model/Cesta.php';
$data['mensaje']='';
$fichero = fopen("factura.txt", "w");
fputs($fichero,"FACTURA DE COMPRA ".PHP_EOL.PHP_EOL);
fputs($fichero, "CODIGO \t PRODUCTO \t\t CANTIDAD \t PRECIO \t IMPORTE". PHP_EOL);
$total=0;
$productosCesta=Cesta::getCestaByCliente($_SESSION['id_usuario']);
foreach ($productosCesta as $cesta) {
	$producto=Producto::getProductoById($cesta->getCod_producto());
	//escribir la linea-producto en factura y actualiza stock en BD	
	if ($producto->getStock()==0){
		$data['mensaje'].= "<br>No hay unidades disponibles del producto: ".$producto->getNombre().", así que no será vendido";
	}else {
		$diferencia=$producto->getStock()-$cesta->getCantidad();
		if ($diferencia<0) {
			$data['mensaje'].= "<br>Unidades insuficientes del producto: ".$producto->getNombre().", seran vendidas solo ".$producto->getStock()." unidades";
			$cantidad=$producto->getStock();
		}else {
			$cantidad=$cesta->getCantidad();
		}
		$importe=$cantidad*$producto->getPrecio();
		$producto->vender($cantidad);
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

Cesta::vaciarCestaByCliente($_SESSION['id_usuario']);
// session_destroy();
// setcookie("total", NULL, -1);
// setcookie("cantidad", NULL, -1);
// setcookie("productos", NULL, -1);
include '../View/compraFinalizada.php';