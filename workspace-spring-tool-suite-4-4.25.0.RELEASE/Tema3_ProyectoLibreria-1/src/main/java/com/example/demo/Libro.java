package com.example.demo;

public class Libro {
	private String titulo;
	private String autor;
	private String genero;
	private String sinopsis;

	// Constructor vacío
	public Libro() {
	}

	// Constructor con todos los campos
	public Libro(String titulo, String autor, String genero, String sinopsis) {
		this.titulo = titulo;
		this.autor = autor;
		this.genero = genero;
		this.sinopsis = sinopsis;
	}

	// Getters y Setters
	public String getTitulo() {
		return titulo;
	}

	public void setTitulo(String titulo) {
		this.titulo = titulo;
	}

	public String getAutor() {
		return autor;
	}

	public void setAutor(String autor) {
		this.autor = autor;
	}

	public String getGenero() {
		return genero;
	}

	public void setGenero(String genero) {
		this.genero = genero;
	}

	public String getSinopsis() {
		return sinopsis;
	}

	public void setSinopsis(String sinopsis) {
		this.sinopsis = sinopsis;
	}

	// Método toString para representar el objeto como cadena
	@Override
	public String toString() {
		return "Título " + titulo + ", del Autor " + autor + ", género " + genero + ", sinopsis " + sinopsis + '.';
	}
}
