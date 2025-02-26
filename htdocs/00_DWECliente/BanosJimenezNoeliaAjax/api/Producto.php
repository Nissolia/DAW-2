<?php
class Producto { 

public int $id;
public int $id_categoria;
public string $nombre;
public float $precio;
public string $descripcion;
public string $imagen;
public string $caracteristicas;


function __construct($id, $id_categoria, $nombre, $precio, $descripcion, $imagen, $caracteristicas) {
	$this->id = $id;
	$this->id_categoria = $id_categoria;
	$this->nombre = $nombre;
	$this->precio = $precio;
	$this->descripcion = $descripcion;
	$this->imagen = $imagen;
	$this->caracteristicas = $caracteristicas;
}

	
}

