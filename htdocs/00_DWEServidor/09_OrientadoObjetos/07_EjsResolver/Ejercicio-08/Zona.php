<?php

class Zona {
    private $nombre;
    private $entradasDisponibles;
    private $precio;
    private $ingresosTotales;

    public function __construct($nombre, $entradasDisponibles, $precio) {
        $this->nombre = $nombre;
        $this->entradasDisponibles = $entradasDisponibles;
        $this->precio = $precio;
        $this->ingresosTotales = 0;
    }

    public function venderEntradas($cantidad) {
        if ($cantidad <= $this->entradasDisponibles) {
            $this->entradasDisponibles -= $cantidad;
            $this->ingresosTotales += $cantidad * $this->precio;
            return "Venta exitosa de $cantidad entradas para la zona ".$this->nombre;
        } else {
            return "No hay suficientes entradas disponibles en la zona ".$this->nombre;
        }
    }

    public function obtenerInfo() {
        return [
            'nombre' => $this->nombre,
            'entradasDisponibles' => $this->entradasDisponibles,
            'precio' => $this->precio,
            'ingresosTotales' => $this->ingresosTotales
        ];
    }

    public function getIngresosTotales() {
        return $this->ingresosTotales;
    }
}
?>
