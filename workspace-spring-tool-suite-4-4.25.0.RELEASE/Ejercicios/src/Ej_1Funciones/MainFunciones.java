package Ej_1Funciones;

import java.util.Scanner;

public class MainFunciones {

	public static void main(String[] args) {
		try (Scanner sc = new Scanner(System.in)) {
			String elige;
			System.out.println("Elige entre los siguiente ejercicios: ");
			System.out.println("a, b, c, d");
			elige = sc.nextLine();

			switch (elige) {
			case "a":
				// Ejercicio a
				System.out.println("Ejercicio a: ");
				System.out.println("Dame dos numeros: ");
				int num1 = sc.nextInt();
				int num2 = sc.nextInt();
				Ej_a.enteros(num1, num2);
				break;
			case "b":
				// Ejercicio b
				System.out.println();
				System.out.println("Ejercicio b: ");
				System.out.println("Dame un numero: ");
				num1 = sc.nextInt();
				Ej_b.numerosPares(num1);
				break;
			case "c":
				// Ejercicio c
				System.out.println();
				System.out.println("Ejercicio c: ");
				Ej_c.areaPoligono();
				break;
			case "d":
				System.out.print("Dame un número entre 0 y 255: ");
				int num = sc.nextInt();

				Ej_d.calcularBinario(num);
				break;

			default:
				System.out.println("No has añadido respuesta correcta...");
				break;
			}
			sc.close();
			System.out.println("Saliendo del programa...");
		}

	}

}
