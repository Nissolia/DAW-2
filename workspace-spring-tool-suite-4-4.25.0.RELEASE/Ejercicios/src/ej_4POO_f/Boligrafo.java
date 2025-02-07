package ej_4POO_f;

public class Boligrafo implements Comparable<Boligrafo> {
	// ATRIBUTOS
	private String nombre;
	private double precio;

// CONSTRUCTORES
	public Boligrafo(String nombre, double precio) {
		this.nombre = nombre;
		this.precio = precio;
	}

//GETTER Y SETTER
	public String getNombre() {
		return nombre;
	}

	public void setNombre(String nombre) {
		this.nombre = nombre;
	}

	public double getPrecio() {
		return precio;
	}

	public void setPrecio(double precio) {
		this.precio = precio;
	}

	/***** MÉTODOS *****/
	public int compareTo(Boligrafo boli) {
		// SE ORDENAN LOS BOLÍGRAFOS POR NOMBRE (MARCA)
		return this.nombre.compareTo(boli.nombre);
	}

	@Override
	public String toString() {
		return nombre + " (" + precio + "€)";
	}
}
