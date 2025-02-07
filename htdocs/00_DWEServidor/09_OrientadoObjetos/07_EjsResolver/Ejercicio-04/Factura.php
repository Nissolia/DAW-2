<!-- Creamos la clase factura con el atributo de clase IVA (21) y los atributos
 de instancia ImporteBase, fecha, estado (pagada o pendiente) y productos
 (array con todos los productos de la factura, que contiene el nombre,
precio y cantidad). Define los métodos AñadeProducto, ImprimeFactura y los
getters y setters de los atributos ImporteBase (solo
getter, pues su contenido se actualiza automaticamente), fecha y estado. -->
<?php
class Factura
{
    private $IVA = 21;
    private $importeBase;
    private $fecha;
    private $estado = false;
    private $productos = [];

    public function __construct()
    {
        $this->importeBase = 0;
        $this->fecha = date('Y-m-d');
    }


    public function getImporteBase()
    {
        return $this->importeBase;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
        return $this;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
        return $this;
    }
// añadir producto, precio y cantidad
    function masProducto($pro)
    {
        $this->productos[] = [$pro];
    }
   
    function ImprimeFactura()
    {
        $totalProductos = 0;
        $productos = "";
        foreach ($this->productos as $key => $value) {
            $productos .= $value . ", ";
            $totalProductos += rand(0.5, 10.99);
        };

        // comprobar si la persona ha pagado
        $pagado = $this->estado ? "pagado" : "no pagado";
        // calcular el iva
        $iva = ($this->importeBase + $totalProductos) * ($this->IVA / 100);
        // el total del importe
        $total = $iva + $this->importeBase;

        return "<hr>Factura de la fecha " . date("d-m-Y", strtotime("$this->fecha")) . " <br>
    y " . $pagado . " con los productos : " . $productos . " <br><br> <i>IVA: " . $iva . " €</i> <br> <b>TOTAL: " . $total . " €</b>";
   
    }
}
