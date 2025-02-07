<?php
include_once 'Coche.php';
// Diseñar una clase CocheLujo, que contendrá todos los atributos y métodos de la clase Coche y además un
// atributo suplemento (se pasa en el constructor), que habrá que añadir al precio cuando se consulte a través del
// método getPrecio(), los coches de lujos también hay que tenerlos en cuenta como posible modelo de coche más
// caro, pero sin contar con el suplemento (solo su precio). En el método toString de la clase CocheLujo también
// hay que devolver el suplemento (es una columna más de la fila de tabla devuelta). 
class CocheLujo extends Coche
{
    private $suplemento;

    public function __construct($matricula, $modelo, $precio, $suplemento)
    {
        parent::__construct($matricula, $modelo, $precio);
        $this->suplemento = $suplemento;
    }

    // Sobreescribimos getPrecio para devolver solo el precio base
    public function getPrecio()
    {
        return parent::getPrecio(); // Devuelve el precio base sin el suplemento
    }

    // Método para obtener el precio total (base + suplemento)
    public function getPrecioTotal()
    {
        return parent::getPrecio() + $this->suplemento;
    }

    // Modificamos el método imprimir para incluir el suplemento en la tabla
    public function imprimir()
    {
        return '<tr><td>' . $this->getMatricula() . '</td><td>' . $this->getModelo() . '</td><td>' . $this->getPrecio() . '</td><td>' . $this->suplemento . '</td></tr>';
    }
}
