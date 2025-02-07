<!-- Confeccionar una clase Empleado con los atributos nombre y sueldo.
Definir un método “asigna” que reciba como dato el nombre y sueldo y
actualice los atributos (debe comprobar
que el nombre recibido coincide con el atributo nombre y si es así actualiza el
atributo sueldo con el sueldo  recibido).

Plantear un segundo método que imprima el nombre y un mensaje si debe o no pagar
impuestos (si el sueldo
supera a 3000 paga impuestos). -->
<?php
class Empleado
{
    private $nombre;
    private $sueldo;

    public function __construct($n, $s)
    {
        $this->nombre = $n;
        $this->sueldo = $s;
    }
    function getNombre()
    {
        return $this->nombre;
    }
    public function asigna($n, $s)
    {
        if ($n == $this->getNombre()) {
            $this->sueldo = $s;
        }
    }
    public function pagaImpuesto()
    {
        if ($this->sueldo > 3000) {
            return "Debes pagar impuestos<br>";
        } else {
            return "No debes pagar impuestos<br>";
        }
    }
    public function __toString()
    {
        return "<hr>$this->nombre <br>
        Con sueldo: $this->sueldo <br><hr>       ";
    }
}
