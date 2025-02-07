<?php // Clase Canario que hereda de Ave
class Canario extends Ave {
    public function cantar() {
        return $this->nombre . " está cantando melodiosamente.";
    }

    public function saltar() {
        return $this->nombre . " está saltando de rama en rama.";
    }

    public function ponerHuevos() {
        return $this->nombre . " ha puesto un huevo pequeño.";
    }
}?>