package Ej_3Matrices;

import java.util.Scanner;

public class ej_a {
	// Creamos la constante para controlar el tamaño de la matriz
	final static int MAX = 5;

	public static void main(String[] args) {
		// Scanner y variables
		Scanner s = new Scanner(System.in);
		int col;

		/*
		 * Hacemos un control de la columna para que nos rellene la matriz con los
		 * números que le pedimos
		 */
		do {
			System.out.println("Dame las columnas de nuestra matriz:");
			col = s.nextInt();
		} while (col < 0 || col > 20);
		s.close();
		// Creamos la matriz con la información que tenemos
		int[][] matriz = new int[MAX][col];
		// Usamos las funciones que hemos creado
		rellenadoMatriz(matriz, col);
		mostrar(matriz, col);
	}

	/************ FUNCIONES ************/
	/* Función que muestra la matriz */
	private static void mostrar(int matriz[][], int col) {
		// Mostramos la matriz
		for (int i = 0; i < MAX; i++) {
			for (int j = 0; j < col; j++) {
				System.out.println("Matriz: " + i + " , " + j + " = " + matriz[i][j]);
			}
		}
	}

	/* Función en la que rellenamos la matriz con numeros aleatorios */
	private static void rellenadoMatriz(int matriz[][], int col) {
		
		for (int i = 0; i < MAX; i++) {
			for (int j = 0; j < col; j++) {
				matriz[i][j] = aleatorio();
			}
		}
	}

	/* Función creada para el número aleatorio */
	private static int aleatorio() {
		// Creamos un numero aleatorio
		int rand = (int) (Math.random() * 11);
		// Devolvemos el número al azar
		return rand;
	}
}
