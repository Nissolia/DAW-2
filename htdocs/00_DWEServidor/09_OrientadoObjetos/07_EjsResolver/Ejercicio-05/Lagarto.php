<?php // Clase Lagarto que hereda de Animal
class Lagarto extends Animal {
    public function reptar() {
        return $this->nombre . " está reptando.";
    }

    public function tomarSol() {
        return $this->nombre . " está tomando el sol.";
    }

    public function mudarPiel() {
        return $this->nombre . " está mudando su piel.";
    }
}?>