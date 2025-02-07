<?php
class Reserva
{
    private $usuario;
    private $fechaHora;
    private $sala;
    private $estado;
    private static $totalPendientes = 0;

    // Constructor
    public function __construct($usu, $fech, $sala)
    {
        $this->usuario = $usu;
        $this->fechaHora = $fech;
        $this->sala = $sala;
        $this->estado = 'PENDIENTE';
        self::$totalPendientes++;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function getSala()
    {
        return $this->sala;
    }

    public function getFechaHora()
    {
        return date("Y-m-d H:i:s", $this->fechaHora);
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function confirmar()
    {
        if ($this->estado === 'PENDIENTE') {
            $this->estado = 'CONFIRMADA';
            self::$totalPendientes--;
        }
    }

    public function anular()
    {
        $diferencia = ($this->fechaHora - time()) / (60 * 60); // Horas hasta la reserva
        if ($diferencia > 34 && $this->estado === 'PENDIENTE') {
            $this->estado = 'ANULADA';
            self::$totalPendientes--;
            return true;
        }
        return false;
    }

    public static function getTotalPendientes()
    {
        return self::$totalPendientes;
    }

    public static function actualizarPendientes($reservas)
    {
        self::$totalPendientes = 0;
        foreach ($reservas as $reserva) {
            if ($reserva->getEstado() === 'PENDIENTE') {
                self::$totalPendientes++;
            }
        }
    }
}
?>
