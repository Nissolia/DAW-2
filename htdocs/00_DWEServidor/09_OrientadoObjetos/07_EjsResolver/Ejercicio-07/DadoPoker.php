<?php

class DadoPoker {
    // definimos las caras del dado
    private $figuras = ['As', 'K', 'Q', 'J', '7', '8'];
    private $ultimoResultado;
    private static $tiradasTotales = 0;

    // método para tirar el dado
    public function tira() {
        // generar un valor aleatorio
        $indice = rand(0, 5);
        $this->ultimoResultado = $this->figuras[$indice];
        DadoPoker::$tiradasTotales++; 
    }

    // nombre de la figura de la última tirada
    public function nombreFigura() {
        return $this->ultimoResultado;
    }

    // tiradas totales de todos los dados
    public static function getTiradasTotales() {
        return DadoPoker::$tiradasTotales;
    }
 
}

?>
