package ej_4POO_d;

public class Main {

	public static void main(String[] args) {
		// CREAMOS PLANTILLAS DE LIBROS PARA USAR EL MAIN
		Libro libro1 = new Libro("Las amapolas", "María Dueñas", 380);
		Libro libro2 = new Libro("Cien años de soledad", "Gabriel García Márquez", 417);

		// MOSTRAMOS LOS LIBROS POR PANTALLA
		System.out.println(libro1);
		System.out.println(libro2);

		// FUNCIÓN PARA COMPARAR LIBROS
		compararLibros(libro1, libro2);
	}

	/********************* FUNCIONES *********************/
	/* Función para comparar dos libros y mostrar cuál tiene más páginas */
	public static void compararLibros(Libro libro1, Libro libro2) {
		if (libro1.getNumPaginas() > libro2.getNumPaginas()) {
			System.out.println("El libro con más páginas es: " + libro1.getTitulo() + " con " + libro1.getNumPaginas()
					+ " páginas.");
		} else if (libro1.getNumPaginas() < libro2.getNumPaginas()) {
			System.out.println("El libro con más páginas es: " + libro2.getTitulo() + " con " + libro2.getNumPaginas()
					+ " páginas.");
		} else {
			System.out.println(
					"Ambos libros tienen la misma cantidad de páginas: " + libro1.getNumPaginas() + " páginas.");
		}
	}
}