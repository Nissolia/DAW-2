package com.example.demo;

public class Usuarios {
	int id;
	String nombre;
	String perfil;

// constructores
	public Usuarios(int id, String nombre, String perfil) {
		super();
		this.id = id;
		this.nombre = nombre;
		this.perfil = perfil;
	}

// getter y setters
	public int getId() {
		return id;
	}

	public void setId(int id) {
		this.id = id;
	}

	public String getNombre() {
		return nombre;
	}

	public void setNombre(String nombre) {
		this.nombre = nombre;
	}

	public String getPerfil() {
		return perfil;
	}

	public void setPerfil(String perfil) {
		this.perfil = perfil;
	}
}
