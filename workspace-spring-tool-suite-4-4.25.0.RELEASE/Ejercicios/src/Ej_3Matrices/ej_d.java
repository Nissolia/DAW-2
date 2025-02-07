package Ej_3Matrices;

import java.util.Scanner;

public class ej_d {
	final static int MAX = 10;

	public static void main(String[] args) {
		// Preparamos el scanner
		Scanner s = new Scanner(System.in);
		int num = 0;
		// Creamos la tabla en la que introduciremos los números
		int[] tabla = new int[MAX];
		System.out.println("Introduce los números de forma creciente: (De menor a mayor)");

		// Usamos este bucle para rellenar los 5 primeros números si el usurio los
		// introduce incorrectamente le pedimos nuevamente el número
		for (int i = 0; i < 5; i++) {
			tabla[i] = s.nextInt();
			// Comprobamos si el número ingresado es mayor o igual al anterior
			if (i > 0 && (tabla[i] < tabla[i - 1])) {
				System.out.println("Por favor, introduce números en orden creciente.");
				// Volvemos al indice anterior para pedir el número
				i--;
			}
		}

		// Mostramos el estado actual de la tabla
		System.out.println("Orden actual de nuestra tabla:");
		mostrarNumeros(tabla);

		// Le pedimos al usuario que introduzca el número a añadir
		System.out.println("Dame el número que quieras introducir:");
		num = s.nextInt();

		// Si el número es mayor que todos, se inserta al final
		int posicion = 5;
		// Buscamos la posición donde debemos insertar el nuevo número
		int index = 0;
		do {
			if (num < tabla[index]) {
				posicion = index;
			}
			index++;
			// Salimos del bucle si una de las dos se cumple
		} while (index < 5 && posicion == 5);

		/*
		 * Desplazamos los elementos hacia la derecha para hacer espacio para el nuevo
		 * número, de esta forma no necesitamos auxiliar para mover los números
		 */
		for (int i = 5; i > posicion; i--) {
			tabla[i] = tabla[i - 1];
		}

		// Insertamos el nuevo número en la posición correspondiente
		tabla[posicion] = num;

		// Mostramos la tabla después de insertar el nuevo número
		System.out.println("Tabla después de insertar el número:");
		mostrarNumeros(tabla);

		// Finalizamos el scaner y el programa
		s.close();
	}

	/******************* FUNCIONES *******************/
	/*
	 * Función para mostrar los números de la tabla. Se deja de mostrar cuando
	 * encuentra un 0/está vacío
	 */
	public static void mostrarNumeros(int[] tabla) {
		int i = 0;
		boolean bandera = false;
		do {
			if (tabla[i] == 0) {
				bandera = true; 
			} else {
				// Solo imprimimos si no es 0
				System.out.print(tabla[i] + " "); 
			}
			i++;
		} while (i < tabla.length && !bandera);
		System.out.println();
	}
}
