<?php
class Categoria { 

public int $id;
public string $nombre;

function __construct($id, $nombre)
{
	$this->id = $id;
	$this->nombre = $nombre;
}
	
}

