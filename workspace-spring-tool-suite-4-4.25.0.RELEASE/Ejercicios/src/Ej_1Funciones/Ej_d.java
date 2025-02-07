package Ej_1Funciones;

import java.util.Scanner;

public class Ej_d {
//	Ejercicio d) Crea una aplicación que
//	muestre en binario un número entre 0 y 255.

	public static void main(String[] args) {
		Scanner scanner = new Scanner(System.in);

		// Pedir al usuario que ingrese un número
		System.out.print("Ingresa un número entre 0 y 255: ");
		int num = scanner.nextInt();

		// Llamar a la función para calcular y mostrar el binario
		calcularBinario(num);

		// Cerrar el scanner
		scanner.close();
	}
// funcion para calcular el numero binario
	public static void calcularBinario(int num) {
		// Verificar que el número está en el rango 0-255
		if (num < 0 || num > 255) {
			System.out.println("El número debe estar entre 0 y 255.");
			return;
		}

		// Convertir el número a binario
		String numTotal = "";
		do {
			numTotal = (num % 2) + numTotal;
			num = num / 2;
		} while (num != 0);

		// Rellenar con ceros para que siempre tenga 8 bits
		while (numTotal.length() < 8) {
			numTotal = "0" + numTotal;
		}

		System.out.println("El número en binario es: " + numTotal);
	}

}
