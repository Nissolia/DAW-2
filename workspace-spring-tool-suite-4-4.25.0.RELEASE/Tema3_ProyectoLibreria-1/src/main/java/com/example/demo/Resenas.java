package com.example.demo;

import java.sql.Date;

public class Resenas {
	int id;
	int id_libro;
	// es el id del usuario
	int usuario;
	int estrellas;
	String resena;
	Date fecha;

	// contructor
	public Resenas(int id, int id_libro, int usuario, int estrellas, String resena, Date fecha) {
		super();
		this.id = id;
		this.id_libro = id_libro;
		this.usuario = usuario;
		this.estrellas = estrellas;
		this.resena = resena;
		this.fecha = fecha;
	}

	// getters
	public int getId() {
		return id;
	}

	public void setId(int id) {
		this.id = id;
	}

	public int getId_libro() {
		return id_libro;
	}

	public void setId_libro(int id_libro) {
		this.id_libro = id_libro;
	}

	public int getUsuario() {
		return usuario;
	}

	public void setUsuario(int usuario) {
		this.usuario = usuario;
	}

	public int getEstrellas() {
		return estrellas;
	}

	public void setEstrellas(int estrellas) {
		this.estrellas = estrellas;
	}

	public String getResena() {
		return resena;
	}

	public void setResena(String resena) {
		this.resena = resena;
	}

	public Date getFecha() {
		return fecha;
	}

	public void setFecha(Date fecha) {
		this.fecha = fecha;
	}

}
