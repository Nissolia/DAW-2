<?php // Clase Ave que hereda de Animal
class Ave extends Animal {
    public function volar() {
        return $this->nombre . " está volando.";
    }

    public function ponerHuevos() {
        return $this->nombre . " está poniendo huevos.";
    }

    public function hacerSonido() {
        return $this->nombre . " está cantando.";
    }
}?>