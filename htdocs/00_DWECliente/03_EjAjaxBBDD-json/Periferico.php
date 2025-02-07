<?php
class Periferico { 

public int $codigo;
public string $descripcion;
public float $precio;
public float $descuento;


function __construct($codigo, $descripcion, $precio, $descuento)
{
	$this->codigo = $codigo;	
	$this->descripcion = $descripcion;
	$this->precio = $precio;
	$this->descuento = $descuento;
}
	
public function getCodigo()
{
    return $this->codigo;
}
	
public function getDescripcion()
{
	return $this->descripcion;
}
		
public function getPrecio()
{
	return $this->precio;
}
public function getDescuento()
{
	return $this->descuento;
}

}

