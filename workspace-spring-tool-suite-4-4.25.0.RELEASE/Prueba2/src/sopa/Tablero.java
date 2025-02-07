package sopa;

import java.util.Random;

public class Tablero {
    private char[][] letras; // Matriz para almacenar las letras
    private int size;

    // Constructor
    public Tablero(int size) {
        this.size = size;
        this.letras = new char[size][size]; // Inicializa la matriz de letras
        llenarTablero(); // Llena el tablero con letras aleatorias
    }

    // Método para llenar el tablero con letras aleatorias
    private void llenarTablero() {
        Random random = new Random();
        for (int i = 0; i < size; i++) {
            for (int j = 0; j < size; j++) {
                letras[i][j] = (char) ('A' + random.nextInt(26)); // Asigna letras aleatorias de A a Z
            }
        }
    }

    // Método para obtener una letra en una posición específica
    public char getLetra(int i, int j) {
        return letras[i][j];
    }

    // Método para obtener el tamaño del tablero
    public int getSize() {
        return size;
    }

    // Método para imprimir el tablero
    public void imprimirTablero() {
        for (char[] fila : letras) {
            for (char letra : fila) {
                System.out.print(letra + " ");
            }
            System.out.println();
        }
    }

	public void insertarPalabra(String palabra, int fila, int columna, boolean horizontal) {
		// TODO Auto-generated method stub
		
	}

}
