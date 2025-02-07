package Ej_1Funciones;

import java.util.Scanner;

public class Ej_c {
	static double total = 0;
	static int num1 = 0;
	static int num2 = 0;
//	Ejercicio c) Crea una aplicación que nos calcule el área de un circulo, cuadrado o
//	triangulo. Pediremos que figura queremos calcular su área y según lo introducido pedirá
//	los valores necesarios para calcular el área. Crea un método por cada figura para calcular
//	cada área, este devolverá un número real. Muestra el resultado por pantalla.
//	A continuación puedes ver la fórmula de cada figura:
//	Circulo: (radio^2)*PI
//	Triangulo: (base * altura) / 2
//	Cuadrado: lado * lado

	public static void areaPoligono() {
		Scanner sc = new Scanner(System.in);
		System.out.println("Di de que figura quieres calcular su area: ");
		System.out.println("1) Circulo, 2) Cuadrado, 3) Triangulo");
		int elecc = sc.nextInt();
		switch (elecc) {
		case 1:
			System.out.println("Introduce el radio del circulo: ");
			elecc = sc.nextInt();
			areaCirculo(elecc);
			break;
		case 2:
			System.out.println("Introduce el la base y la altura del triangulo: ");
			num1 = sc.nextInt();
			num2 = sc.nextInt();
			areaTriangulo(num1, num2);
			break;
		case 3:
			System.out.println("Introduce el lado del cuadrado: ");
			elecc = sc.nextInt();
			areaCuadrado(elecc);
			break;

		default:
			System.out.println("No has añadido la informacion correcta...");
			break;
		}
		sc.close();
	}

	private static void areaCirculo(int num) {
		total = Math.pow(num, 2) * Math.PI;
		System.out.println("El area del circulo es: " + total);

	}

	private static void areaTriangulo(int base, int altura) {
		total = (base * altura) / 2;
		System.out.println("El area del triangulo es: " + total);
	}

	private static void areaCuadrado(int num) {
		total = num * num;
		System.out.println("El area del triangulo es: " + total);
	}

}
