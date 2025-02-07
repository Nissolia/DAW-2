package ej_4POO_d;

public class Libro {
	// ATRIBUTOS
	private int isbn;
	private String titulo;
	private String autor;
	private int numPaginas;
	// Contador para hacer ID dinámica
	private static int contador = 0;
	
	// CONSTRUCTOR
	public Libro(String titulo, String autor, int numPaginas) {
		contador++;
		this.isbn = contador;
		this.titulo = titulo;
		this.autor = autor;
		this.numPaginas = numPaginas;
	}

	// GETTER Y SETTERS
	public int getIsbn() {
		return isbn;
	}

	public void setIsbn(int isbn) {
		this.isbn = isbn;
	}

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

	public int getNumPaginas() {
		return numPaginas;
	}

	public void setNumPaginas(int numPaginas) {
		this.numPaginas = numPaginas;
	}
//TO STRING

	@Override
	public String toString() {
		return "EL libro con ISBN " + isbn + " con el título " + titulo + " por el autor " + autor + " tiene "
				+ numPaginas + " paginas.";
	}

}
