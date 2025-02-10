<?php
$codEstado = 200;
$metodo = $_SERVER['REQUEST_METHOD'];

function crearBaraja($num)
{
    $palos = ["espada", "basto", "copa", "oro"];
    $baraja = [];

    // Creamos la baraja
    for ($i = 0; $i < $num; $i++) {
        $numero = rand(1, 12);
        $palo = " <img src='img/".($palos[array_rand($palos)]).".png' alt=''>";
        $baraja[] = ['palo' => $palo, 'numero' => $numero];
    }

    return $baraja;
}

if (isset($_REQUEST['numero'])) {
    $numeroCartas = $_REQUEST['numero'];
    // Creamos la baraja
    $baraja = crearBaraja($numeroCartas);
    $mensaje = "BARAJA INSERTADA CORRECTAMENTE";
    $codEstado = 200;
} else {
    $mensaje = "ERROR, PARÁMETRO 'NUMERO' NO VÁLIDO";
    $codEstado = 400;
}

$devolver['mensaje'] = $mensaje;
$devolver['codEstado'] = $codEstado;
$devolver['baraja'] = isset($baraja) ? $baraja : null;

// Establecemos la cabecera de la respuesta
setCabecera($codEstado, $mensaje);

echo json_encode($devolver);

function setCabecera($codEstado, $mensaje)
{
    // Establecemos la cabecera HTTP
    header("HTTP/1.1 $codEstado $mensaje");
    header("Content-Type: application/json;charset=utf-8");
}
