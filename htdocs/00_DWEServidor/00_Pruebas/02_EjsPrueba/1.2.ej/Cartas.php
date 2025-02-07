<?php
if (session_status() === PHP_SESSION_NONE) session_start();
if (!isset($_SESSION['cartasUsuario'])) {
    $_SESSION['cartasUsuario'] = [];
    $_SESSION['puntuajeUsuario'] = 0;
}
if (!isset($_SESSION['cartasIA'])) {
    $_SESSION['cartasIA'] = [];
    $_SESSION['puntuajeIA'] = 0;
}
// tenemos aqui la clase cartas
class Cartas
{
    // 
    static private $cartas = ['A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K'];

    public function __construct() {}
    // funcion contar puntos
    static function conteoCartas($user)
    {
        for ($i = 0; $i < count($_SESSION['cartas' . $user]); $i++) {
            $carta =  $_SESSION['cartas' . $user][$i];
            // si la carta tiene uno de esos simbolos suma 10 puntos
            if (in_array($carta, ['J', 'Q', 'K'])) {
                $_SESSION['puntuaje' . $user] += 10;
                // si la carta es un As suma 10
            } else if ($carta == 'A') {

                $_SESSION['puntuaje' . $user] += 11;
                // lo sobrante a ser numeros pues simplemente lo volcamos como enteros
            } else {
                $_SESSION['puntuaje' . $user] +=$carta;
            }
        }
    }
    // funcion para pedir carta
    function pedirCarta()
    {

        // para que el rand no se salga del indice que hemos hecho
        return rand(2, count(self::$cartas) - 1);
    }
}
