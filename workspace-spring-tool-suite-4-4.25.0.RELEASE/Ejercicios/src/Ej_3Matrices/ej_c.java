package Ej_3Matrices;

public class ej_c {
	// Constantes de filas y columnas
	final static int f = 8;
	final static int c = 6;

	public static void main(String[] args) {
		// Variables
		int[][] matriz = new int[f][c];
		// mostramos el texto para luego mostrar el marco
		System.out.println("Matriz marco:");
		marco(matriz);
	}

	/************** FUNCIONES **************/
	/*
	 * Funión en la que mostramos el marco de 1 y 0 matriz: la matriz que vamos a
	 * mostrar por pantalla
	 */
	private static void marco(int matriz[][]) {
		// Doble bucle para mostrar el marco por consola
		for (int i = 0; i < f; i++) {
			for (int j = 0; j < c; j++) {
				/*
				 * Sale uno si es fila 0 o columna 0 pero tambien
				 * si es el final de la columna o de la fila
				 */
				if (i == 0 || i == (f - 1) || j == 0 || j == (c - 1)) {
					matriz [f][c]= 1;
					System.out.print(matriz [f][c]);
				} else {
					System.out.print(matriz [f][c]);
				}

			}
			System.out.println("");
		}

	}
}
