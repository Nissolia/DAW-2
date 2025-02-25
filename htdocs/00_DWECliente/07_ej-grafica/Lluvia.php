<?php
class Lluvia {
    public $mes;
    public $lluvia;
    public $id;

    public function __construct($id = null,$mes, $lluvia) {
        $this->mes = $mes;
        $this->lluvia = $lluvia;
    }
}
