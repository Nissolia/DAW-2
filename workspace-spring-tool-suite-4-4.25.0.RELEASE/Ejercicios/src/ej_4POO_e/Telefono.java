package ej_4POO_e;

public class Telefono {
	// ATRIBUTOS
	private String marca;
	private int precio;

	// CONSTRUCTOR
	public Telefono(String marca, int precio) {
		this.marca = marca;
		this.precio = precio;
	}

	// GET Y SETTERS
	public String getMarca() {
		return marca;
	}

	public void setMarca(String marca) {
		this.marca = marca;
	}

	public int getPrecio() {
		return precio;
	}

	public void setPrecio(int precio) {
		this.precio = precio;
	}

	// MÉTODOS
	/* Método compareTo para ordenar por precio */
	public int compareTo(Telefono movil) {
		// COMPARAMOS POR PRECIO
		int precioCompare = Integer.compare(this.precio, movil.precio);
		return precioCompare;
	}
}
