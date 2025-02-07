package ej_4POO_e;

public class Telefono2 implements Comparable<Telefono2> {
	// ATRIBUTOS
	private String marca;
	private int precio;

	// CONSTRUCTOR
	public Telefono2(String marca, int precio) {
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

	//MÉTODOS
	/* Método compareTo para ordenar por precio y si son iguales por marca */
	@Override
	public int compareTo(Telefono2 movil) {
		// COMPARAMOS PRIMERO POR PRECIO
		int precioCompare = Integer.compare(this.precio, movil.precio);
		if (precioCompare != 0) {
			return precioCompare;
		}
		// SI SON LOS PRECIOS IGUALES SE HACE POR MARCA
		return this.marca.compareTo(movil.marca);
	}
}
