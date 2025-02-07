<?php
include_once 'Vehiculo.php';
class Coche extends Vehiculo
{
    // Quemar rueda
    public function quemarRueda()
    {
        return "¡Estoy quemando rueda con el coche!";
    }

}
