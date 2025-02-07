<?php
class Vehiculo {
    protected $kmRecorridos = 0;  // No estático
    protected static $vehiculosCreados = 0;
    protected static $vehiculos = [];  // Array estático para almacenar los vehículos
    
    public function __construct() {
        Vehiculo::$vehiculosCreados++;
        Vehiculo::$vehiculos[] = $this;  // Guardamos la instancia del vehículo
    }

    // Método para obtener el kilometraje recorrido
    public function getKmRecorridos() {
        return $this->kmRecorridos;  // Ahora devuelve el km de la instancia
    }

    public static function getVehiculosCreados() {
        return Vehiculo::$vehiculosCreados;
    }

    // Modificado para sumar los km de todos los vehículos
    public static function getKmTotales() {
        $totalKm = 0;
        foreach (Vehiculo::$vehiculos as $vehiculo) {
            $totalKm += $vehiculo->getKmRecorridos();  // Sumamos los km de cada vehículo
        }
        return $totalKm;
    }
    
    public function andar($km) {
        if ($km > 0) {
            $this->kmRecorridos += $km;  // Aumentamos los km de la instancia
        }
    }
}
