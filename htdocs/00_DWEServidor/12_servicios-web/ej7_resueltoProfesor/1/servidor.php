<?php
if ($_REQUEST['cantidad'] && isset( $_REQUEST['moneda'])) {
    if ( $_REQUEST['cantidad']>0) {
        $codigo=200;
        $mensaje='OK';
        $cant = $_REQUEST['cantidad'];
        if ($_REQUEST['moneda']=="eur") {
            $cantidad = $cant*166.386;
            $moneda="pesetas";
        }else if ($_REQUEST['moneda']=="pes") {
            $cantidad = $cant/166.386;
            $moneda="euros";
        }else {
            $codigo=400;
            $mensaje='No se ha recibido una moneda permitida';
            $cantidad = 0;
            $moneda='';
        }
    }else {
        $codigo=400;
        $mensaje='La cantidad debe ser positiva';
        $cantidad = 0;
        $moneda=''; 
    }
}else{
    $codigo=400;
    $mensaje='No se han recibido todos los datos para la conversión';
    $cantidad = 0;
    $moneda='';
}
header("HTTP/1.1 $codigo $mensaje");  
header("Content-Type: application/json;charset=utf-8");   
echo json_encode(['resultado' => $cantidad,'moneda' => $moneda,
                  'cantidad_inicial'=>$_REQUEST['cantidad'],
                  'moneda_inicial'=>$_REQUEST['moneda']]);