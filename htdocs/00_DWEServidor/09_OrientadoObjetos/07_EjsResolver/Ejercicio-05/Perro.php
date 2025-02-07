<?php // Clase Perro que hereda de Mamifero
class Perro extends Mamifero {
    public function ladrar() {
        return $this->nombre . " está ladrando.";
    }

    public function correr() {
        return $this->nombre . " está corriendo.";
    }

    public function buscar() {
        return $this->nombre . " está buscando algo.";
    }
}?>