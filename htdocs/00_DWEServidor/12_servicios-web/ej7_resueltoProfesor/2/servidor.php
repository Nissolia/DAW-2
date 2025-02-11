<?php

$codeError = 200;
$errorMsg = "OK";
$cartas=[];
if(isset($_REQUEST['c'])){

    $cantidad = $_REQUEST['c'];

    if($cantidad < 1 || $cantidad > 40){
        $codeError = 400;
        $errorMsg = 'La cantidad debe estar entre 1 y 40.';
    }else{
        $palos =['oros', 'copas', 'espadas', 'bastos'];
        $numeros = [1, 2, 3, 4, 5, 6, 7, "sota", "caballo", "rey"];

        for($i=0; $i<$cantidad; $i++){
            do{
                $determinarPalo = rand(0, (count($palos)-1));
                $determinarNumero = rand(0, (count($numeros)-1));
                $carta = $numeros[$determinarNumero].' de '.$palos[$determinarPalo];
    
            }while(in_array($carta, $cartas));
            
            $cartas[] = $carta;

        }
    }    
}else {
    $codeError = 400;
    $errorMsg = 'El parámetro número de cartas es obligatorio.';
}
header("HTTP/1.1 $codeError $errorMsg");  
header("Content-Type: application/json;charset=utf-8");  
echo json_encode($cartas);